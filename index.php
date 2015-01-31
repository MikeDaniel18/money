<?php
include('vendor/autoload.php');

$parser = new \League\CommonMark\CommonMarkConverter();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Money Example</title>

<!-- Bootstrap core CSS -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body style="margin-top: 70px;">

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">browner12/money</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="build/coverage">Code Coverage</a></li>
                <li><a href="https://github.com/browner12/money">Github <i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="panel panel-success">
        <div class="panel-heading">Money</div>
        <div class="panel-body">

            <p>
                Creating a new <code>Money</code> object is simple. <?php echo PHP_INT_MAX; ?>
                <?php new \browner12\money\Money(9223372036854775810, 'usd'); ?>
            </p>

            <p><code>$money = new \browner12\money\Money(1575, 'EUR');</code></p>

            <p>
                Pass an integer value as the first parameter, and pass the 3-letter currency designation as the second parameter. If left blank, the default currency is <code>USD</code>. You may pass the currency is any case (<code>USD</code> or <code>usd</code>) and internally the package will handle instantiating the correct <code>Currency</code> object.
            </p>

            <p>
                <code>Money</code> provides some public methods. We will use <code>$money = new \browner12\money\Money(1575, 'USD');</code> in the following examples. <?php $money = new \browner12\money\Money(1575, 'USD'); ?>
            </p>

            <hr />

            <h5><code>$money->subunits();</code></h5>

            <?php var_dump($money->subunits()); ?>

            <hr />

            <h5><code>$money->value();</code></h5>

            <?php var_dump($money->value()); ?>

            <hr />

            <h5><code>$money->getCurrency();</code></h5>

            <?php var_dump($money->getCurrency()); ?>

            <hr />

            <h5><code>$money->jsonSerialize();</code></h5>

            <?php var_dump($money->jsonSerialize()); ?>

            <hr />

            <h5><code>$money->format();</code></h5>

            <?php var_dump($money->format()); ?>

            <hr />

            <h5><code>$money();</code></h5>

            <?php var_dump($money); ?>

        </div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">Currency</div>
        <div class="panel-body">

            <p>
                <code>Currency</code> follows ISO 4217. They are designated by 3 letters, and include the properties 'name', 'code', 'basis units', and 'precision'. See the <a href="http://en.wikipedia.org/wiki/ISO_4217" target="_blank">Wikipedia article</a> for a full list of active codes.
            </p>

            <p>
                All specific currencies (<code>USD</code>, <code>EUR</code>, <code>AUD</code>, etc) extend the base <code>Currency</code> class. This abstract base class contains methods to access the properties (CONSTANTS actually) of the specific currency classes. There should be relatively little (no) need to instantiate any of these currencies classes, but it is good to know how they operate.
            </p>

            <?php
            $money = new \browner12\money\Money(1575, 'USD');
            ?>

            This hat costs <?php echo $money->format(); ?>.
        </div>
    </div>

    <div class="panel panel-danger">
        <div class="panel-heading">Accountant</div>
        <div class="panel-body">

            <p>The <code>Accountant</code> is responsible for handling your <code>Money</code>. He can perform lots of calculations on your <code>Money</code>, including adding and subtracting, calculating tax, allocating among divisions, and more. </p>
            <?php
            $money = new \browner12\money\Money(1575, 'USD');
            ?>

            <h4>Sum</h4>

            <hr />

            <h4>Add</h4>

            <hr />

            <h4>Subtract</h4>

            <hr />

            <h4>Calculate Tax</h4>

            <hr />

            <h4>Allocate</h4>

            <hr />

            <h4>Exchange </h4><span class="label label-danger">Experimental - Use With Caution</span>

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Formatting</div>
        <div class="panel-body">

            <p>
                You are free to use your own formatter to display the <code>Money</code> value. However, the built-in PHP <code>NumberFormatter</code> is included with <code>Money</code>. To display the <code>Money</code> value, simply call <code>->format()</code>. You may also pass a 'locale' as the first argument: <code>->format('en-CA')</code>will display the money according to locale rules. The default value of the locale is <code>en-US</code>.
            </p>

            <?php
            $money = new \browner12\money\Money(1575, 'usd');
            ?>

            <code>$money = new \browner12\money\Money(1575, 'usd');</code><br /><br />

            <p><code>$money->format('en-US')</code> <?php echo $money->format('en_US'); ?></p>
            <p><code>$money->format('en-CA')</code> <?php echo $money->format('en_CA'); ?></p>
            <p><code>$money->format('de-DE')</code> <?php echo $money->format('de_DE'); ?></p>
            <p><code>$money->format('ru-RU')</code> <?php echo $money->format('ru_RU'); ?></p>
            <p><code>$money->format('ja-JP')</code> <?php echo $money->format('ja_JP'); ?></p>

        </div>
    </div>

</div>


<!--Bootstrap core JavaScript-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>
