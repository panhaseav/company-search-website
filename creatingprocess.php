
<?php
    //Includes the navbar file in create company page.
    include "navbar.php";
    //Icludes the connection file in create company page.
    include "connection.php";
    //Check that does we have a variable name submit
    if (isset($_POST['submit']))
    {
        //take the values from the form ans put to a variable accordingly.
        $company_name = $_POST['company_name'];
        $company_size = $_POST['company_size'];
        $company_tags = $_POST['company_tags'];
        $company_url = $_POST['company_url'];
        $company_email = $_POST['company_email'];
        $company_phone = $_POST['company_phone'];
        $country = $_POST['country'];
        $company_description = $_POST['company_description'];
        //check that eny of the variable from the for is empty or the whole form is empty.
        if ((empty($company_name) || empty($company_size) || empty($company_tags) || empty($company_url) || empty($company_email) || empty($company_phone) || empty($country) || empty($company_description)) || (empty($company_name) && empty($company_size) && empty($company_tags) && empty($company_url) && empty($company_email) && empty($company_phone) && empty($company_description)))
        {
            //Check that all the field of the forms are empty.
            if (empty($company_name) && empty($company_size) && empty($company_tags) && empty($company_url) && empty($company_email) && empty($company_phone) && empty($company_description))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=Everything");
                //Stop the execution here.
                exit();
            }
            //Checks that variable $company_name is empty.
            elseif (empty($company_name))
            {   //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=name");
            }
            //Checks that variable $company_size is empty.
            elseif (empty($company_size))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=size");
            }
            //Checks that variable $company_tags is empty.
            elseif (empty($company_tags))
            {
                 //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=tag");

            }
            //Checks that variable $company_url is empty.
            elseif (empty($company_url))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=url");

            }
            //Checks that variable $company_email is empty.
            elseif (empty($company_email))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=email");
            }
            //Checks the email format entered using a filter validate.
            elseif (filter_var($company_email, FILTER_VALIDATE_EMAIL))
            {
                 //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=notemail");
            }
            //Checks that variable $company_phone is empty.
            elseif (empty($company_phone))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=phone");
            }
            //Checks that variable $company_phone is empty.
            elseif (empty($country))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=country");

            }
             //Checks that variable $company_phone is empty.
            elseif (empty($company_description))
            {
                //Redirect to a createcompany.php page with an error.
                header("Location: createcompany.php?error=description");
            }

        }
        else
        {
            //Checks tha the preparation of the statement.If its false then it goes into this statement.
            if (!$stmt = $connection->prepare("INSERT INTO company (company_name, company_size, company_tags, company_url, company_email, company_phone, country, company_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"))
            {
                //Print out the error occured
                echo $connection->error;
            }
            //Checks tha the bind param of the statement.If its false then it goes into this statement.
            if (!$stmt->bind_param("ssssssss", $company_name, $company_size, $company_tags, $company_url, $company_email, $company_phone, $country, $company_description))
            {
                //Print out the error occured
                echo "Error in binding Param";
            }
            //Checks is the execute of the statemt  is failed.
            if (!$stmt->execute())
            {
                //Print out the error occured
                echo $connection->error;

            }
            else
            {
                //if none of the above happen it redirects to comapny page with a success message.
                header("Location: createcompany.php?sucess=done");
            }
        }
    }

?>
