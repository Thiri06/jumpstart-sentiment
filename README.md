# Jumpstart Sentiment Analysis System

<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  <br><br>
  <p>
    <a href="#about"><img src="https://img.shields.io/badge/AI%20Powered-Sentiment%20Analysis-ff6b6b" alt="AI Powered"></a>
    <a href="#installation"><img src="https://img.shields.io/badge/PHP-8.1+-777BB4?logo=php" alt="PHP Version"></a>
    <a href="#installation"><img src="https://img.shields.io/badge/Laravel-10.x-FF2D20?logo=laravel" alt="Laravel Version"></a>
    <a href="#license"><img src="https://img.shields.io/badge/License-MIT-blue.svg" alt="License"></a>
  </p>
</div>

<div id="about"></div>

## 📋 About Jumpstart Sentiment Analysis

<div class="alert alert-info">
Jumpstart Sentiment Analysis is an AI-powered customer feedback analysis system built for Jumpstart, a nationwide fashion retailer with 750 stores and a growing e-commerce presence. The system leverages artificial intelligence to automatically analyze and categorize customer reviews and inquiries, providing valuable insights into customer sentiment and helping to improve overall customer experience.
</div>

---

<div id="business-process"></div>

## 🔄 Business Process Flow

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header bg-primary text-white">
        <h5>1. Customer Feedback Collection</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>Customers submit product reviews through product detail pages</li>
          <li>Customers submit inquiries through the contact form</li>
          <li>Each submission is stored in the database</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header bg-success text-white">
        <h5>2. Sentiment Analysis Processing</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>The system automatically analyzes the text content using Hugging Face API</li>
          <li>Sentiment is categorized as Very Positive, Positive, Neutral, Negative, or Very Negative</li>
          <li>Results are stored alongside the original feedback</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header bg-warning text-dark">
        <h5>3. Feedback Management</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>Administrators can view all feedback with sentiment analysis results</li>
          <li>Feedback can be filtered by sentiment category</li>
          <li>Administrators can respond to or delete customer inquiries/reviews</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-header bg-info text-white">
        <h5>4. Insight Generation</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>Sentiment trends are visualized in the admin dashboard</li>
          <li>Products with negative sentiment are highlighted for attention</li>
          <li>Overall customer satisfaction metrics are calculated</li>
        </ul>
      </div>
    </div>
  </div>
</div>

---

<div id="features"></div>

## ✨ Key Features

<div class="row">
  <div class="col-lg-4">
    <div class="feature-box text-center p-4">
      <div class="feature-icon mb-3">
        <i class="bi bi-robot" style="font-size: 2.5rem; color: #ff6b6b;"></i>
      </div>
      <h4>AI-Powered Sentiment Analysis</h4>
      <ul class="list-unstyled text-start">
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Real-time analysis using Hugging Face API</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Keyword-based fallback mechanism</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Five-category sentiment classification</li>
      </ul>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="feature-box text-center p-4">
      <div class="feature-icon mb-3">
        <i class="bi bi-star-half" style="font-size: 2.5rem; color: #ff6b6b;"></i>
      </div>
      <h4>Customer Review System</h4>
      <ul class="list-unstyled text-start">
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Star rating system for products</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Review submission with sentiment analysis</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Sentiment-based filtering</li>
      </ul>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="feature-box text-center p-4">
      <div class="feature-icon mb-3">
        <i class="bi bi-chat-dots" style="font-size: 2.5rem; color: #ff6b6b;"></i>
      </div>
      <h4>Inquiry Management</h4>
      <ul class="list-unstyled text-start">
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Contact form for customer inquiries</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Sentiment analysis of inquiries</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Admin interface for management</li>
      </ul>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-lg-6">
    <div class="feature-box text-center p-4">
      <div class="feature-icon mb-3">
        <i class="bi bi-speedometer2" style="font-size: 2.5rem; color: #ff6b6b;"></i>
      </div>
      <h4>Admin Dashboard</h4>
      <ul class="list-unstyled text-start">
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Overview of sentiment metrics</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Review and inquiry management</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Filtering and search capabilities</li>
      </ul>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="feature-box text-center p-4">
      <div class="feature-icon mb-3">
        <i class="bi bi-phone" style="font-size: 2.5rem; color: #ff6b6b;"></i>
      </div>
      <h4>Responsive Design</h4>
      <ul class="list-unstyled text-start">
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Mobile-friendly interface</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Bootstrap 5 framework</li>
        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Consistent branding throughout</li>
      </ul>
    </div>
  </div>
</div>

---

<div id="technical"></div>

## 🔧 Technical Implementation

<div class="row">
  <div class="col-md-6">
    <h4>Technology Stack</h4>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><strong>Backend</strong></td>
          <td>Laravel PHP Framework</td>
        </tr>
        <tr>
          <td><strong>Frontend</strong></td>
          <td>Bootstrap 5, JavaScript</td>
        </tr>
        <tr>
          <td><strong>Database</strong></td>
          <td>MySQL</td>
        </tr>
        <tr>
          <td><strong>AI Integration</strong></td>
          <td>Hugging Face Sentiment Analysis API</td>
        </tr>
        <tr>
          <td><strong>Authentication</strong></td>
          <td>Laravel built-in authentication</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-6">
    <h4>System Architecture</h4>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td><strong>Architecture Pattern</strong></td>
          <td>MVC (Model-View-Controller)</td>
        </tr>
        <tr>
          <td><strong>Business Logic</strong></td>
          <td>Service-based approach</td>
        </tr>
        <tr>
          <td><strong>Routing</strong></td>
          <td>Controller-based web interfaces</td>
        </tr>
        <tr>
          <td><strong>External Services</strong></td>
          <td>API integration</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

---

<div id="installation"></div>

## 📥 Installation

<div class="card">
  <div class="card-body">
    <ol>
      <li>
        <strong>Clone the repository:</strong>
        <pre><code class="language-bash">git clone https://github.com/Thiri06/jumpstart-sentiment.git</code></pre>
      </li>
      <li>
        <strong>Install PHP dependencies:</strong>
        <pre><code class="language-bash">composer install</code></pre>
      </li>
      <li>
        <strong>Create and configure your environment file:</strong>
        <pre><code class="language-bash">cp .env.example .env
php artisan key:generate</code></pre>
      </li>
      <li>
        <strong>Configure your database in the .env file:</strong>
        <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jumpstart_sentiment
DB_USERNAME=root
DB_PASSWORD=</code></pre>
      </li>
      <li>
        <strong>Configure Hugging Face API credentials:</strong>
        <pre><code>HUGGINGFACE_API_URL=your_api_url
HUGGINGFACE_API_KEY=your_api_key</code></pre>
      </li>
      <li>
        <strong>Run database migrations and seeders:</strong>
        <pre><code class="language-bash">php artisan migrate --seed</code></pre>
      </li>
      <li>
        <strong>Start the development server:</strong>
        <pre><code class="language-bash">php artisan serve</code></pre>
      </li>
    </ol>
  </div>
</div>

---

<div id="usage"></div>

## 🖥️ Usage

<div class="row">
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header bg-primary text-white">
        <h5>Customer Interface</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>Browse products at <code>/products</code></li>
          <li>View product details and reviews at <code>/products/{id}</code></li>
          <li>Submit product reviews (requires login)</li>
          <li>Submit inquiries through the contact form at <code>/contact</code></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card h-100">
      <div class="card-header bg-danger text-white">
        <h5>Admin Interface</h5>
      </div>
      <div class="card-body">
        <ul>
          <li>Access admin dashboard at <code>/admin/dashboard</code> (requires admin privileges)</li>
          <li>View and manage reviews at <code>/admin/reviews</code></li>
          <li>View and manage inquiries at <code>/admin/inquiries</code></li>
          <li>Delete inappropriate content as needed</li>
        </ul>
      </div>
    </div>
  </div>
</div>

---

<div id="business-impact"></div>

## 📊 Business Impact

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 text-center mb-3">
            <div class="impact-icon mb-3">
              <i class="bi bi-graph-up" style="font-size: 3rem; color: #28a745;"></i>
            </div>
            <h5>Enhanced Customer Understanding</h5>
            <p>Gain deeper insights into customer opinions and preferences.</p>
          </div>
          <div class="col-md-4 text-center mb-3">
            <div class="impact-icon mb-3">
              <i class="bi bi-lightning-charge" style="font-size: 3rem; color: #fd7e14;"></i>
            </div>
            <h5>Operational Efficiency</h5>
            <p>Automatically categorize and prioritize customer feedback, reducing manual review time.</p>
          </div>
          <div class="col-md-4 text-center mb-3">
            <div class="impact-icon mb-3">
              <i class="bi bi-shield-check" style="font-size: 3rem; color: #17a2b8;"></i>
            </div>
            <h5>Proactive Issue Resolution</h5>
            <p>Quickly identify negative feedback for prompt resolution.</p>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-6 text-center">
            <div class="impact-icon mb-3">
                <i class="bi bi-bar-chart" style="font-size: 3rem; color: #6f42c1;"></i>
            </div>
            <h5>Data-Driven Decision Making</h5>
            <p>Use sentiment trends to inform product development and marketing strategies.</p>
          </div>
          <div class="col-md-6 text-center">
            <div class="impact-icon mb-3">
              <i class="bi bi-emoji-smile" style="font-size: 3rem; color: #20c997;"></i>
            </div>
            <h5>Improved Customer Experience</h5>
            <p>Address customer concerns more effectively, leading to higher satisfaction.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

---

<div id="future"></div>

## 🚀 Future Enhancements

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <i class="bi bi-globe2 text-primary me-2"></i> Integration with social media platforms for broader sentiment analysis
          </li>
          <li class="list-group-item">
            <i class="bi bi-graph-up-arrow text-success me-2"></i> Advanced analytics dashboard with predictive insights
          </li>
          <li class="list-group-item">
            <i class="bi bi-chat-square-text text-info me-2"></i> Automated response suggestions based on sentiment
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <i class="bi bi-translate text-warning me-2"></i> Multi-language support for international customers
          </li>
          <li class="list-group-item">
            <i class="bi bi-people text-danger me-2"></i> Integration with CRM systems for comprehensive customer profiles
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

---

<div id="screenshots"></div>

## 📸 Screenshots

<div class="row">
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h5>Product Detail Page with Sentiment Analysis</h5>
      </div>
      <img src="https://via.placeholder.com/600x400?text=Product+Detail+Page" class="card-img-top" alt="Product Detail Page">
      <div class="card-footer text-muted">
        Customer reviews with sentiment badges
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h5>Admin Dashboard</h5>
      </div>
      <img src="https://via.placeholder.com/600x400?text=Admin+Dashboard" class="card-img-top" alt="Admin Dashboard">
      <div class="card-footer text-muted">
        Sentiment analysis overview and metrics
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h5>Review Management</h5>
      </div>
      <img src="https://via.placeholder.com/600x400?text=Review+Management" class="card-img-top" alt="Review Management">
      <div class="card-footer text-muted">
        Admin interface for managing customer reviews
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header">
        <h5>Contact Form with Sentiment Analysis</h5>
      </div>
      <img src="https://via.placeholder.com/600x400?text=Contact+Form" class="card-img-top" alt="Contact Form">
      <div class="card-footer text-muted">
        Customer inquiry form with sentiment processing
      </div>
    </div>
  </div>
</div>

---

<div id="license"></div>

## 📄 License

<div class="alert alert-secondary">
  The Jumpstart Sentiment Analysis system is open-sourced software licensed under the <a href="https://opensource.org/licenses/MIT" class="alert-link">MIT license</a>.
</div>

---

<div id="acknowledgments"></div>

## 👏 Acknowledgments

<div class="row text-center">
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="60" alt="Laravel" class="mb-3">
        <p>The PHP framework used</p>
        <a href="https://laravel.com" class="btn btn-sm btn-outline-primary">Visit Website</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" height="60" alt="Bootstrap" class="mb-3">
        <p>Frontend framework</p>
        <a href="https://getbootstrap.com" class="btn btn-sm btn-outline-primary">Visit Website</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <img src="https://huggingface.co/front/assets/huggingface_logo-noborder.svg" height="60" alt="Hugging Face" class="mb-3">
        <p>AI models for sentiment analysis</p>
        <a href="https://huggingface.co" class="btn btn-sm btn-outline-primary">Visit Website</a>
      </div>
    </div>
  </div>
</div>

---

<div align="center">
  <p>Developed with ❤️ for Jumpstart Fashion Retailer</p>
  <p>
    <a href="#about">About</a> •
    <a href="#business-process">Process Flow</a> •
    <a href="#features">Features</a> •
    <a href="#installation">Installation</a> •
    <a href="#usage">Usage</a> •
    <a href="#business-impact">Impact</a>
  </p>
</div>

<!-- Add custom styles for GitHub -->
<style>
  .feature-box, .card {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s ease;
    margin-bottom: 20px;
  }
  
  .feature-box:hover, .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }
  
  .feature-icon, .impact-icon {
    display: inline-block;
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 50%;
    background-color: rgba(255, 107, 107, 0.1);
    text-align: center;
  }
  
  h4 {
    margin-top: 1rem;
    margin-bottom: 1rem;
    font-weight: 600;
  }
  
  .alert {
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
  }
  
  .alert-info {
    background-color: #d1ecf1;
    border-color: #bee5eb;
    color: #0c5460;
  }
  
  .alert-secondary {
    background-color: #e2e3e5;
    border-color: #d6d8db;
    color: #383d41;
  }
  
  pre {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    overflow-x: auto;
  }
  
  code {
    color: #e83e8c;
    word-wrap: break-word;
  }
  
  .card-header {
    font-weight: 600;
  }
  
  .bg-primary {
    background-color: #ff6b6b !important;
  }
  
  .btn-outline-primary {
    color: #ff6b6b;
    border-color: #ff6b6b;
  }
  
  .btn-outline-primary:hover {
    background-color: #ff6b6b;
    border-color: #ff6b6b;
    color: white;
  }
</style>
