<?php
      header("Access-Control-Allow-Credentials: true");
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
      header("Access-Control-Allow-Headers: Accept, X-Access-Token, X-Application-Name, X-Request-Sent-Time");
 
      if (($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000000000))
      { 
            if ($_FILES["file"]["error"] > 0)
            { 
                  echo "Return Code: " . $_FILES["file"]["error"] . ""; 
            }
            else
            { 
                  $nomeIni = substr($_FILES["file"]["name"],0,3);
                  $nomeIni = strtolower($nomeIni);

                  if($nomeIni == 'inf')
                  {
                        if (file_exists("upload/Info/" . $_FILES["file"]["name"]))
                        {
                              echo $_FILES["file"]["name"] . " already exists. ";
                        }
                        else
                        {
                              move_uploaded_file($_FILES["file"]["tmp_name"],"upload/Info/" . $_FILES["file"]["name"]);
                              echo "Storedin:" . "upload/Info/" . $_FILES["file"]["name"];
                        }
                  }
                  else
                  {
                        if (file_exists("upload/php/" . $_FILES["file"]["name"]))
                        {
                              echo $_FILES["file"]["name"] . " already exists. ";
                        }
                        else
                        {
                              move_uploaded_file($_FILES["file"]["tmp_name"], "upload/php/" . $_FILES["file"]["name"]);
                              echo "Storedin:" . "upload/php/" . $_FILES["file"]["name"];
                        }
                  }
            }
      }
      else
      { 
            echo "Invalid file"; 
      } 
?>