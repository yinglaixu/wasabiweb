<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Renthia</title>

    <!-- Latest compiled and minified CSS of bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
        body{
            background-color: #f6f6f6;
            margin-top: 50px;
        }
        .container{
            width: 800px;
            background: white;
            padding-left: 0px;
        }
        .sideImg{
            width: 300px;
            height: 600px;
            background-image: url("http://www.renthia.com/wp-content/uploads/2016/07/email-pic.jpg");
            background-repeat: no-repeat;

        }
        .footer{
            padding-top: 30px;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="row content">
        <div class="col-xs-12">
            <div class="col-xs-5 sideImg"></div>
            <div class="col-xs-6 col-xs-offset-1">
                <table class="body-wrap">
                    <tr>
                        <td></td>
                        <td class="container">
                            <!-- content -->
                            <div class="content">
                                <table>
                                    <tr>
                                        <td>
                                            <h3>Thank you for using Renthia!</h3>
                                            <p>We are processing your property and will get back to you as soon as possible.</p>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Summary of the property:</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p><strong>Country:</strong><br>
                                                            <?php echo $country; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><strong>City:</strong><br>
                                                            <?php echo $city; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Area:</strong><br>
                                                            <?php echo $area; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><strong>Type of property:</strong><br>
                                                            <?php echo $property_type; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Rooms:</strong><br>
                                                            <?php echo $rooms; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><strong>Size:</strong><br>
                                                            <?php echo $volume; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Address:</strong><br>
                                                            <?php echo $address; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Date from:</strong><br>
                                                            <?php echo $date_from; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><strong>Date to:</strong><br>
                                                            <?php echo $date_to; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Price:</strong><br>
                                                            <?php
                                                            $currency = "SEK/Month";
                                                            if ($country === 'Netherlands' || $country === 'Nederland'){
                                                                $currency = "Eur/Month";
                                                            }
                                                            ?>
                                                            <?php echo $price . ' ' .$currency; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Utilities: </strong>
                                                            <?php if( is_array( $utils ) ) : ?>
                                                                <?php $utils_merge = implode( ', ', $utils ); ?>
                                                                <br><?php echo $utils_merge; ?>
                                                            <?php endif; ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p><strong>Extras: </strong>
                                                            <?php if( is_array( $extras ) ) : ?>
                                                                <?php $extras_merge = implode( ', ', $extras ); ?>
                                                                <br><?php echo $extras_merge; ?>
                                                            <?php endif; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p><strong>Description:</strong><br>
                                                            <?php echo $description; ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            <strong>Open house:</strong>
                                                            <?php for( $i = 0; $i < count( $open_date ); $i++ ) : ?>
                                                                <br>
                                                                <?php echo $open_date[$i] . ' - ' . $open_time[$i]; ?>
                                                            <?php endfor; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /content -->

                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-xs-12 footer">
            <div class="col-xs-4">
                <img width="150px" src="http://www.renthia.com/wp-content/uploads/2015/12/Renthia_logo.png">
            </div>
            <div class="col-xs-4 col-xs-offset-4">
                <p>Thanks, have a lovely day.</p>
                <p><a href="http://www.renthia.com">www.renthia.com</a></p>
            </div>
        </div>
    </div>
</div>


</body>
</html>
