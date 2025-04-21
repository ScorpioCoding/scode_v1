<?php

namespace Modules\Api\Utils;

use App\Core\NewException;


class MailValidationEmail
{
  private string $email = "";
  private string $link = "";
  private string $subject = "";
  private string $body = "";
  private string $headers = "";

  /**
   * MailValidateEmail Constructor
   * @param string $emailTo
   * @param string $token
   */
  public function __construct(string $emailTo, string $link)
  {
    $this->email = $emailTo;
    $this->link = $link;
    $this->setSubject();
    $this->setMail();
    $this->setHeaders();
  }

  private function setSubject()
  {
    $this->subject = COMPANY_NAME . " Account Email Validation";
  }
  private function setMail()
  {
    $this->body = "
        <!DOCTYPE html>
        <html>
        <head>
        <title>Email Validation Request</title>
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
          
          *,
          *::before,
          *::after {
            box-sizing: border-box;
            outline: none;
          }

          /* Remove default margin */
          * {
            margin: 0;
            padding: 10px;
          }

          html {
            block-size: 100%;
          }
          body {
            font-family: Poppins, sans-serif;
            font-size: 1rem;
          }

          .container-center {
            margin: 10 auto;
            padding: 10px;
            width: 95%;
            overflow-y: auto;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
           align-items: center;
          }
          p {
            margin: 10px;
            padding: 0;
            max-width: 65ch;
          }

          .social-links {
            display: flex;
            flex-direction: row;
            gap: 20px;
            padding: 10px;
          }
          .social-links a {
            text-decoration: none;
            color: #333;
            font-size: 1.5rem;
          }
        </style>
        </head>
        <body>
        <section class='container-center'>
        <h2>" . COMPANY_NAME . " Email Validation</h2>
        <div>
        <p>This is an automated email from" . COMPANY_NAME . "</p>
        <p></p>
        <p><a href=" . $this->link . ">Please click Here?</a></p>
        </div>
        </section>
        </body>
        </html>
        ";

  }

  private function setHeaders()
  {
    $this->headers = "MIME-Version: 1.0" . "\r\n";
    $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $this->headers .= 'From: no-reply@' . COMPANY_DOMAIN_NAME . "\r\n";
  }


  public function execMail(): array
  {
    try {
      mail($this->email, $this->subject, $this->body, $this->headers);
      return array(
        "state" => true,
        "data" => array("Your Account Email Validation was sent!")
      );
    } catch (NewException $e) {
      return array(
        "state" => false,
        "data" => array("Server Error", $e->getMessage())
      );
    }

  }











  //END CLASS
}