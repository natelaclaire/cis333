<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>2.1 PHP Basics</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  <body>

    <h1>PHP Basics</h1>

    <h2>What is PHP?</h2>

    <p>
        According to the PHP Foundation, PHP (recursive acronym for PHP: Hypertext Preprocessor) 
        is a widely-used open source general-purpose scripting language that is especially suited
        for web development and can be embedded into HTML (https://www.php.net/manual/en/introduction.php).
    </p>

    <p>
        Originally, PHP was an acronym for Personal Home Page and was a scripting language exclusively
        used for add small amounts of interactivity to HTML pages, but it has far outgrown that historical
        context.
    </p>

    <p>
        We'll be talking a lot about a couple of groups of people, so let's briefly introduce them:
    </p>

    <ul>
        
        <li>
            <strong>The PHP Foundation (https://thephp.foundation/)</strong> - a collective of people and
            organizations relying on the PHP language. Its mission is to ensure the long-term prosperity
            of the PHP language. The people who support, advance, and develop the PHP Language.
        </li>

        <li>
            <strong>PHP Framework Interop Group (https://www.php-fig.org/)</strong> - a group of established
            PHP projects whose goal is to talk about commonalities between projects and find ways to work
            better together. The people who create PHP Standards Recommendations (PSRs).
        </li>

    </ul>

    <h2>PHP Tags</h2>

    <p>
        PSR-1 (Basic Coding Standard; https://www.php-fig.org/psr/psr-1/) specifies that we should use only
        the following PHP tags:
    </p>

    <?php
    echo $something;
    ?>

    <?=$something; ?>

    <p>
        The <script></script> tag and ASP-style delimiters are no longer valid for PHP and short delimiters
        are turned off by default and are therefore not recommended.
    </p>

    <h2>PHP is Embedded in XHTML?</h2>

    <p>
        The textbook talks a lot about PHP being embedded in XHTML. As I mentioned, PHP was originally
        embedded in HTML. When the book was published, XHTML was the recommended HTML version. Today
        we generally use HTML5, so I'll be using HTML5 for examples when we use HTML.
    </p>
    
    <p>
        Note that sometimes PHP isn't embedded in HTML at all. We'll look at examples where we open
        a PHP code block at the start of the file and don't close it, which causes the entire file
        to be executed by the PHP processor. We may or may not output HTML.
    </p>

    <p>
        It is valid to leave a PHP code block unclosed if there is no non-PHP code after the PHP code
        ends. In fact, it is recommended if the PHP file might be included in another PHP file to
        avoid a common coding error where whitespace at the end of a file causes the PHP processor
        to send the HTTP headers prematurely because it saw the whitespace as part of the document body.
    </p>

    <h2>PHP Statements</h2>

    <p>
        Within PHP tags you will find one or more statements, separated by semicolons:
    </p>

    <?php
    echo 'I am a statement';
    echo $iAmAnotherStatement;
    andIAmYetAnotherStatement();
    ?>

    <p>
        Note that multiple statements can appear on the same line.
    </p>

    <h2>PHP Code Blocks</h2>

    <p>
        There seems to be some disagreement in terms. The book and I refer to what is found inside
        a PHP tag as a PHP code block, but within online resources you may find "code block"
        defined as what appears between curly braces in PHP:
    </p>

    <?php
    {
        // This is one code block.
    }
    {
        echo 'This is another code block.';
    }
    ?>

    <p>
        Curly braces are used to logically group sets of PHP statements. We'll be using them a lot,
        but seldom on their own as they appear here. You'll see what I mean in a few weeks.
    </p>
    
  </body>
</html>