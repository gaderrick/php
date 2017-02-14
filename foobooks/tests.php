<?php
require('Tools.php');
require('Form.php');

use DWA\Tools;

$form = new DWA\Form($_GET);

$errors = $form->validate(
    [
        'email' => 'required|email',
        'username' => 'alphaNumeric',
        'year' => 'numeric',
        'age' => 'min:16',
        'score' => 'max:5',
        'rank' => 'numeric|min:0|max:5',
    ]
);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Form Tests</title>
    <meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link href='css/styles.css' rel='stylesheet'>

</head>
<body>

    <section>
        
        <h2>Tools Tests<h2>
            <?php
            Tools::dump('Dump of a string');
            Tools::dump(['Dump of an array','a','b','c']);
            Tools::d('Dump of a string using the dump alias');
            ?>
        </section>

        <section>
            <h2>Form Tests</h2>
            <form>

                <label for='email'>Email (required|email)</label>
                <input type='text' name='email' id='email' value='<?=$form->prefill('email', 'foo@bar')?>'>

                <label for='username'>username (alphaNumeric)</label>
                <input type='text' name='username' id='username' value='<?=$form->prefill('username', 'foob@r')?>'>

                <label for='age'>Year (numeric)</label>
                <input type='text' name='year' value='<?=$form->prefill('year', 'abcd')?>'>

                <label for='age'>Age (min:16)</label>
                <input type='number' name='age' value='<?=$form->prefill('age', '99')?>'>

                <label for='score'>Score (max:5)</label>
                <input type='number' name='score' value='<?=$form->prefill('score', '99')?>'>

                <label for='rank'>Rank (numeric|min:0|max:5)</label>
                <input type='number' name='rank' value='<?=$form->prefill('rank', '99')?>'>

                <input type='submit' class='btn'>

                <?php if($errors): ?>
                    <div class='alert alert-danger'>
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </form>

        </section>

    </body>