<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class SentimentAnalyzer
{
    protected $apiUrl;
    protected $apiKey;
    protected $timeout = 10; // 10 seconds timeout

    public function __construct()
    {
        $this->apiUrl = env('HUGGINGFACE_API_URL');
        $this->apiKey = env('HUGGINGFACE_API_KEY');
    }

    /**
     * Analyze sentiment of a given text using Hugging Face model.
     *
     * @param string $text
     * @return string Sentiment label (e.g., Neutral, Positive, Very Negative)
     */
    public function analyze(string $text): string
    {
        try {
            // Try to use the API first
            return $this->analyzeWithAPI($text);
        } catch (Exception $e) {
            // Log the error
            Log::error('Sentiment API error: ' . $e->getMessage());

            // Fall back to basic keyword analysis
            return $this->basicSentimentAnalysis($text);
        }
    }

    /**
     * Analyze sentiment using the Hugging Face API
     *
     * @param string $text
     * @return string
     * @throws Exception
     */
    protected function analyzeWithAPI(string $text): string
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ])
                ->withOptions([
                    'verify' => false, // Disable SSL verification - ONLY FOR DEVELOPMENT
                    'timeout' => $this->timeout, // Set timeout
                ])
                ->post($this->apiUrl, [
                    'inputs' => $text
                ]);

            if ($response->failed()) {
                Log::info('API failed: ' . $response->status());
                throw new Exception('API request failed with status: ' . $response->status());
            }

            $results = $response->json();
            Log::info('API response for text: ' . $text);
            Log::info(json_encode($results));

            // Check if results is an array
            if (!is_array($results)) {
                Log::info('Results is not an array');
                throw new Exception('Invalid API response format');
            }

            // Handle doubly-nested array structure [[{...}, {...}, ...]]
            if (isset($results[0]) && is_array($results[0]) && !isset($results[0]['label'])) {
                $results = $results[0]; // Unwrap the outer array
                Log::info('Unwrapped nested array structure');
            }

            // Case 1: Results is an array of objects with label and score
            if (isset($results[0]) && isset($results[0]['label'])) {
                // Find the highest scoring label
                $highestScore = 0;
                $selectedLabel = 'Neutral'; // Default

                foreach ($results as $result) {
                    if (isset($result['label']) && isset($result['score']) && $result['score'] > $highestScore) {
                        $highestScore = $result['score'];
                        $selectedLabel = $result['label'];
                    }
                }

                Log::info('Selected label (from array): ' . $selectedLabel . ' with score: ' . $highestScore);
                return $selectedLabel;
            }

            // Case 2: Results is a single object with label
            if (isset($results['label'])) {
                Log::info('Selected label (from single object): ' . $results['label']);
                return $results['label'];
            }

            // Case 3: If we reach here, the format is unexpected
            Log::warning('Unexpected API response format: ' . json_encode($results));
            return 'Neutral'; // Default fallback
        } catch (Exception $e) {
            Log::error('API connection error: ' . $e->getMessage());
            throw $e; // Re-throw to be caught by the main analyze method
        }
    }

    /**
     * Basic sentiment analysis based on keywords when API is unavailable
     *
     * @param string $text
     * @return string
     */
    protected function basicSentimentAnalysis(string $text): string
    {
        Log::info('Using fallback sentiment analysis for: ' . $text);

        $textLower = strtolower($text);

        // Define keyword lists for different sentiment categories
        $veryPositiveKeywords = ['amazing', 'excellent', 'outstanding', 'perfect', 'love', 'best', 'fantastic'];
        $positiveKeywords = ['good', 'nice', 'great', 'happy', 'pleased', 'satisfied', 'like'];
        $negativeKeywords = ['bad', 'poor', 'disappointing', 'unhappy', 'dislike', 'issue', 'problem'];
        $veryNegativeKeywords = ['terrible', 'horrible', 'awful', 'worst', 'hate', 'disaster', 'useless'];

        // Count occurrences of each sentiment category
        $veryPositiveCount = 0;
        $positiveCount = 0;
        $negativeCount = 0;
        $veryNegativeCount = 0;

        foreach ($veryPositiveKeywords as $keyword) {
            if (strpos($textLower, $keyword) !== false) {
                $veryPositiveCount++;
            }
        }

        foreach ($positiveKeywords as $keyword) {
            if (strpos($textLower, $keyword) !== false) {
                $positiveCount++;
            }
        }

        foreach ($negativeKeywords as $keyword) {
            if (strpos($textLower, $keyword) !== false) {
                $negativeCount++;
            }
        }

        foreach ($veryNegativeKeywords as $keyword) {
            if (strpos($textLower, $keyword) !== false) {
                $veryNegativeCount++;
            }
        }

        // Determine sentiment based on keyword counts
        if ($veryPositiveCount > 0) {
            return 'Very Positive';
        } elseif ($positiveCount > 0 && $negativeCount == 0 && $veryNegativeCount == 0) {
            return 'Positive';
        } elseif ($veryNegativeCount > 0) {
            return 'Very Negative';
        } elseif ($negativeCount > 0 && $positiveCount == 0 && $veryPositiveCount == 0) {
            return 'Negative';
        } else {
            return 'Neutral';
        }
    }
}
