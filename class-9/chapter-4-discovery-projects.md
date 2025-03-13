---
layout: default
title: "Chapter 4 Discovery Projects"
published: true
---

# Chapter 4 Discovery Projects

## Discovery Project 4-1

We’re going to add a contact form to our Web site. Our first step is to identify the fields that should be included in the form. What specific fields are included is up to you, but at a minimum you should include a first name, email address, and message. Take a moment and list out for your own reference what fields you will include, including the field labels, names, whether or not the field is required, and any length and data type requirements. For example:

| Label | Name | Required? | Min Length | Max Length | Data Type | HTML Element |
| :---- | :---- | :---- | :---- | :---- | :---- | :---- |
| First Name | first | Yes | 1 | 100 | String | Input Type=Text |
| Email Address | email | Yes | 5 | 255 | String | Input Type=Email |
| Message | message | Yes | 5 | 600 | String | Textarea |
| Birth Year | birthYear | No | 4 | 4 | Integer | Input Type=Number Step=1 Min=1900 Max=(13 years ago) |

Armed with that information, in the next several projects we’re going to create some functions to generate the types of HTML elements that we will need. This way we can reuse these functions in various places (hint: you will need these again\!).

## Discovery Project 4-2

Part of our goal in modern programming is to write self-documenting code. This doesn’t entirely negate the need for code comments, but reduces the need for comments and makes the code easier to read by using functions and variables with descriptive names to perform small tasks. Combining these small functions together in unique ways allows us to solve complex problems while ensuring that our code is easy to read. We’re going to build a tiny function that will define an HTML attribute. You’ll see how we’re going to use it in the next project. Add the following to `includes/function.php`:

```php
function htmlAttribute(string $name, string|null $value = null): string  
{  
    $htmlAttribute = $name;

    // if a value is not supplied, this is a unary attribute  
    // (it has no value and is only present if true)  
    if (!is_null($value)) {  
        $htmlAttribute .= '="'.$value.'"';
    }

    return $htmlAttribute;

}
```

## Discovery Project 4-3

The next function that we need will build the HTML Label tag, which we’ll need for our form inputs. As we build our HTML tags in the following functions, we’ll use the `htmlAttribute()` function from above and append each attribute onto an array. Then we’ll `implode()` the array, separated by spaces, to create a string containing the HTML tag. Add the following to `includes/function.php`:

```php
function formLabel(string $label, string $for, array $classes = array('form-label')): string
{  
    $htmlElement = ['label'];

    $htmlElement[] = htmlAttribute('for', $for);

    if (count($classes)) {  
        // classes in the class attribute are space-separated, so  
        // we’ll take an array and implode it with spaces as the "glue"
        $htmlElement[] = htmlAttribute('class', implode(' ', $classes));  
    }

    $htmlElementString = '<'.implode(' ', $htmlElement).'>';

    $htmlBlock = $htmlElementString.$label.'</label>';

    return $htmlBlock;

}
```

## Discovery Project 4-4

Next we’re going to create some larger functions for building specific types of HTML form fields. The first of these creates an input tag with a type of text, which we’ll call a text field. There are many optional attributes, a few of which are unary. Add the following to `includes/function.php`:

```php
function textField(string $label, string $name, array $validationResult = array(), 
    int|null $minLength = null, int|null $maxLength = null, string|null $placeholder = null, 
    bool $required = false, bool $readOnly = false, array $classes = array('form-control'), 
    string|null $id = null): string
{  
    $htmlElement = ['input', htmlAttribute('type', 'text')];

    $htmlElement[] = htmlAttribute('name', $name);

    // we are going to require the ID HTML attribute but leave the
    // $id PHP function parameter optional by using the $name
    // as the $id if the $id isn't provided
    if (empty($id)) {  
        $id = $name;  
    }  
    $htmlElement[] = htmlAttribute('id', $id);

    if ($required) {  
        $htmlElement[] = htmlAttribute('required');  
    }

    if ($readOnly) {  
        $htmlElement[] = htmlAttribute('readonly');  
    }

    if (!empty($placeholder)) {  
        $htmlElement[] = htmlAttribute('placeholder', $placeholder);
    }

    if (isset($minLength)) {  
        $htmlElement[] = htmlAttribute('minlength', $minLength);  
    }

    if (isset($maxLength)) {  
        $htmlElement[] = htmlAttribute('maxlength', $maxLength);
    }

    $value = filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH);

    if (!empty($value)) {  
        $htmlElement[] = htmlAttribute('value', $value);
    }

    $validationMessage = '';

    // if the name is found within the $validationResult array, then  
    // we know that the value is invalid, so we output the feedback  
    // and mark the field as invalid  
    if (isset($validationResult[$name])) {  
        $validationMessage = '<div id="validationFeedback-'.$name.'" class="invalid-feedback">'.
            htmlspecialchars($validationResult[$name]).'</div>';  
        $classes[] = 'is-invalid';  
    }

    if (count($classes)) {  
        $htmlElement[] = htmlAttribute('class', implode(' ', $classes));
    }

    $htmlElementString = '<'.implode(' ', $htmlElement).'>';

    $htmlBlock = '<div class="mb-3">';  
    $htmlBlock .= formLabel($label, $id);  
    $htmlBlock .= $htmlElementString;  
    $htmlBlock .= $validationMessage;  
    $htmlBlock .= '</div>';

    return $htmlBlock;

}
```

## Discovery Project 4-5

Using the `textField()` function as an example, add a new function to `includes/functions.php` called `emailField()`. You’ll mostly be able to copy the `textField()` function, but it should incorporate the following changes:

1. Pass FILTER_SANITIZE_EMAIL to filter_input() in place of FILTER_SANITIZE_SPECIAL_CHARS and remove the fourth parameter (FILTER_FLAG_ENCODE_HIGH).  
2. The type attribute for the input tag should be “email” instead of “text”.

## Discovery Project 4-6

Using the `textField()` function as an example, add a new function to `includes/functions.php` called `textareaField()`. You’ll mostly be able to copy the `textField()` function, but it should incorporate the following changes:

1. The tag should be “textarea” instead of “input” and the type attribute should be removed.  
2. Add parameters for at least the following `<textarea>` tag attributes (you can use the [mdn web docs \<textarea\> element page](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea) as guidance and feel free to add other attributes as parameters if you want):  
   1. Wrap (default = soft)  
   2. Cols (default = 20)  
   3. Rows (default = 2)
3. `<textarea>` doesn't have a `value` attribute. Instead, the value appears between the opening and closing tag. So, you'll need to:
   1. Move the `if (!empty($value)) { [...] }` block from after the `$value = [...]` line to after the `$htmlBlock .= $htmlElementString;` line.
   2. Replace `$htmlElement[] = htmlAttribute('value', $value);` with `$htmlBlock .= $value;`.
   3. Below that, add `$htmlBlock .= '</textarea>';`.

## Discovery Project 4-7

Looking through your list of fields for your contact form, implement functions to create any additional elements needed for your contact form, using `textField()` as a starting point and the [mdn web docs](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input) as guidance. For example, if you need an input field with a type of number (perhaps called `numberField()`), you would probably want to change:

1. The type attribute for the input tag should be “number” instead of “text”.  
2. The $minLength and $maxLength parameters would be replaced with $min and $max (referring to the range of numbers rather than the length of the string).  
3. You would likely want a $step parameter to populate the step attribute.  
4. You might use [FILTER_SANITIZE_NUMBER_INT](https://www.php.net/manual/en/filter.constants.php#constant.filter-sanitize-number-int) or [FILTER_SANITIZE_NUMBER_FLOAT](https://www.php.net/manual/en/filter.constants.php#constant.filter-sanitize-number-float) in place of FILTER_SANITIZE_SPECIAL_CHARS (and remove the FILTER_FLAG_ENCODE_HIGH flag since it isn’t needed).

## Discovery Project 4-8

Next, we need to actually assemble the form. Open `includes/functions.php` and add the following function (modify as needed to include any fields that you added):  

```php
function displayContactForm(array $validationResult = []): void  
{  
    echo '<form method="post" action="'.constructUrl('contact-us').'" class="row g-3">';

    if (count($validationResult)) {  
        if (isset($validationResult['sendingError'])) {  
            echo '<div class="alert alert-danger" role="alert">'.$validationResult['sendingError'].'</div>';  
        } else {  
            echo '<div class="alert alert-danger" role="alert">Something is not right. Please check the message'.(count($validationResult)==1?'':'s').' below, make any necessary corrections, and try again. Thank you!</div>';  
        }  
    }

    echo textField('First Name', 'first', $validationResult, 1, 100, null, true); // see how unclear positional arguments can be?  
    echo emailField('Email Address', 'email', $validationResult, minLength: 5, maxLength: 255, placeholder: null, required: true); // named arguments clarify things  
    echo textareaField(label: 'Message', validationResult: $validationResult, name: 'message', rows: 3, maxLength: 600, minLength: 5, wrap: 'soft', required: true); // and with named arguments, you can skip any default values and use whatever order you want  
    echo '<button type="submit" class="btn btn-primary">Send</button>';  
    echo '</form>';  
}
```

## Discovery Project 4-9

Next, we need to validate the form submission. Add the following function to `includes/functions.php` (modify as needed to validate any fields that you added):  

```php
function validateContactForm(): array  
{  
    $results = [];

    // Note that this is more verbose than needed and not nearly flexible  
    // enough! We will improve it in a few weeks.

    if (empty($_POST['first'])) {  
        $results['first'] = 'First Name is required.';  
    } else {
        $firstLength = strlen(trim($_POST['first']));
        if ($firstLength == 0 || $firstLength > 100) {  
            $results['first'] = 'First Name should be 1-100 characters.';  
        }
    }

    if (empty($_POST['email'])) {  
        $results['email'] = 'Email Address is required.';  
    } else {
        $email = trim($_POST['email']);
        $emailLength = strlen($email);  
        if ($emailLength < 5 || $emailLength > 255) {  
            $results['email'] = 'Email Address should be 5-255 characters.';  
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)===FALSE) {  
            $results['email'] = 'Email Address is invalid.';  
        }
    }
    
    if (empty($_POST['message'])) {  
        $results['message'] = 'Message is required.';  
    } else {
        $messageLength = strlen(trim($_POST['message']));  
        if ($messageLength < 5 || $messageLength > 600) {  
            $results['message'] = 'Message should be 5-600 characters.';  
        }  
    }
        
    return $results;  
}
```

## Discovery Project 4-10

Next, we need to send the email. Use the following as a starting point, but be sure to add any additional fields that you added to your form. You will need to include them in both the “fetch the information…” and the “create the HTML…” sections. Add this to the `includes/functions.php` file:  

```php
function sendContactFormEmail(): bool|string
{  
    // these are the same for all submissions  
    $toAddress = 'your.email@maine.edu'; // your email address here  
    $fromAddress ='webform@myserver.mydomain.com'; // this needs to relate to the sending server / service  
    $fromName = 'Your Web Site';
    $subject = 'Message from Web site';

    // fetch the information entered into the form  
    $replyTo = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  
    $first = filter_input(INPUT_POST, 'first', FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
    $message = nl2br(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS)); // this removes HTML from the message by HTML-encoding special characters and then converts newlines to HTML line break tags (\<br\>)

    // create the HTML for the message body  
    $html = '<p><strong>First Name:</strong> '.$first.'</p>';  
    $html .= '<p><strong>Email:</strong> '.$replyTo.'</p>';  
    $html .= '<p><strong>Message:</strong> '.$message.'</p>';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    
    try {
        // SMTP Config
        $mail->isSMTP();
        $mail->Host = 'localhost'; // Your SMTP server
        $mail->SMTPAuth = false;
        $mail->Port = 25; // SMTP port

        // Email Content
        
        // "From" needs to be a valid address that your SMTP server has permission to send from
        $mail->setFrom($fromAddress, $fromName);

        // "Reply-To" can be the address of the person who submitted the form
        $mail->addReplyTo($replyTo, $first);

        // this is the "To" address
        $mail->addAddress($toAddress);

        $mail->Subject = $subject;
        $mail->Body = $html;

        $mail->send();

        return true;

    } catch (PHPMailer\PHPMailer\Exception $e) {
        return $mail->ErrorInfo;
    }
}
```

## Discovery Project 4-11

Now let’s put it together! Create a file named `contact-us.php` in the `includes` folder and place the following in it:

```php
<div class="container px-4 py-5">
    <h1>Contact Us</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') { // validate and either send or redisplay the form if this request is a POST  
        $validationResult = validateContactForm();

        if (count($validationResult)==0) {  
            // there were no validation messages, so we send  
            if ($sendStatus = sendContactFormEmail()) {  
                // sending was successful, so display a confirmation  
                echo '<div class="alert alert-success" role="alert">Thank you for reaching out! We&rsquo;ll be in touch within 48 hours.</div>';  
            } else {  
                // something went wrong with sending even though the form validated - we’ll display the error received and ask them to try again  
                displayContactForm(['sendingError' => "<p>There was a problem sending the message: {$sendStatus}</p><p>Please double-check what you entered and try again in a few seconds. We apologize for the inconvenience.</p>"]);  
            }  
        } else {  
            // there were validation messages, so we redisplay the form along with the messages  
            displayContactForm($validationResult);  
        }  
    } else { // or display the form for the first time if this request is a GET  
        displayContactForm();  
    }
    ?>
</div>
```

## Discovery Project 4-12

Finally, let’s include the `includes/contact-us.php` file when someone visits the `contact-us` URL. Open the `index.php` file and find the switch block. Immediately before the `default:` line, add the following:  

```php
    case 'contact-us':  
        include(APP_PATH.'includes/contact-us.php');  
        break;
```

Save your changes and visit index.php. Click the link to the Contact Us page and test the form!
