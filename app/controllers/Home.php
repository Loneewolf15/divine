<?php

class Home extends Controller{ 
    private $userModel;
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome - Divine Portfolio',
        ];
        $this->view('home/index', $data);
    }

    public function portfolio()
    {
        $data = [
            'title' => 'Works - Divine Portfolio',
        ];
        $this->view('home/portfolio', $data);
    }

    public function contact(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Process the form data
      
        $contactData = [
            'name' => trim($_POST['name']),
           
            'email' => trim($_POST['email']),
        
            'message' => trim($_POST['message']),
        ];

        // Call the model method to store the form data
        if ($this->userModel->storeContactFormData($contactData)) {
            // If data is stored successfully, send an email
          //  if ($this->sendContactEmail($contactData)) {
            if(1 ==1){
                flash('contact_success', 'Your message has been sent successfully!');
                 //Set Data
                 $data = [
                    'title' => 'Contact - Divine Portfolio',
                ];
      // Load homepage/index view
      $this->view('home/contact', $data);
            } else {
                flash('contact_error', 'Failed to send email. Please try again later.');
                redirect('home/contact');
            }
        } else {
            flash('contact_error', 'Failed to store contact data. Please try again later.');
            redirect('home/contact');
        }
    } else {
      

      //Set Data
      $data = [
        'title' => 'Contact - Divine Portfolio',
    ];
      // Load homepage/index view
      $this->view('home/contact', $data);
    }
    }


    public function sendContactEmail($data) {
      // Compose the email body
      $emailBody = "
          <html>
          <head>
              <style>
                  body {
                      font-family: Arial, sans-serif;
                      line-height: 1.6;
                      color: #333;
                  }
                  .container {
                      width: 80%;
                      margin: auto;
                      padding: 20px;
                      border: 1px solid #ddd;
                      border-radius: 5px;
                      background-color: #f9f9f9;
                  }
                  .header {
                      background-color: #007BFF;
                      color: white;
                      padding: 10px;
                      text-align: center;
                  }
                  .content {
                      padding: 20px;
                  }
                  .content p {
                      margin: 10px 0;
                  }
                  .footer {
                      background-color: #007BFF;
                      color: white;
                      padding: 10px;
                      text-align: center;
                  }
              </style>
          </head>
          <body>
              <div class='container'>
                  <div class='header'>
                      <h1>Contact Form Submission</h1>
                  </div>
                  <div class='content'>
                      <p><strong>Full Name:</strong> {$data['fullname']}</p>
                      <p><strong>Email:</strong> {$data['email']}</p>
                      <p><strong>Phone:</strong> {$data['phone']}</p>
                      <p><strong>Subject:</strong> {$data['subject']}</p>
                      <p><strong>Message:</strong></p>
                      <p>{$data['message']}</p>
                  </div>
                  <div class='footer'>
                      <p>Thank you for contacting us!</p>
                  </div>
              </div>
          </body>
          </html>
      ";
  
      // Set email headers
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: {$data['fullname']} <{$data['email']}>" . "\r\n";
      $headers .= "Cc: anonymoux7x@gmail.com" . "\r\n"; // Add CC recipient here
  
      // Send the email
      if (mail('info@solisvest.com', $data['subject'], $emailBody, $headers)) {
          return true;
      } else {
          return false;
      }
  }



    public function resume()
    {
        $data = [
            'title' => 'Resume - Divine Portfolio',
        ];
        $this->view('home/resume', $data);
    }
}