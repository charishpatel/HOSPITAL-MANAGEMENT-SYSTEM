<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>CSS Registration Form</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
       <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"/>
    
    </head>
    <body>    
        <?php
        include 'nav.php';
        ?>
        <div class="jumbotron" style="">
            <form action="" class="register">
            <h1>Registration</h1>
            
            <fieldset class="row2">
                <legend>P Details
                </legend>
                <p>
                    <label>Name *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>Phone *
                    </label>
                    <input type="text" maxlength="10"/>
                </p>
                <p>
                    <label class="optional">Street
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>City *
                    </label>
                    <input type="text" class="long"/>
                </p>
                <p>
                    <label>Country *
                    </label>
                    <select>
                        <option>
                        </option>
                        <option value="1">United States
                        </option>
                    </select>
                </p>
                <p>
                    <label class="optional">Website
                    </label>
                    <input class="long" type="text" value="http://"/>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    Services
                </p>
                <table class="inner">
        <thead>
            <tr>
                <th style="width: 100px;">Id</th>
                <th>Service name</th>
                <th>Department</th>
                <th>Price</th>
                <th>Update</th>
                <th><font style="color:#ffffff">Delete</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
        
    </table>
                
            </fieldset>
            <fieldset class="row4">
                <legend>Register
                </legend>
                <div><button class="button">Register &raquo;</button></div>
            </fieldset>
            <div><button class="button">Register &raquo;</button></div>
        </form>
        </div>
    </body>
</html>





