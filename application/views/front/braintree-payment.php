<?php
// require_once 'braintree-php-2.30.0/lib/Braintree.php';

// Braintree_Configuration::environment('sandbox');
// Braintree_Configuration::merchantId('bdkn8m9hwn48jmn2');
// Braintree_Configuration::publicKey('zv5hpv4yqwk5ffz3');
// Braintree_Configuration::privateKey('e75b02ebc390d21329a78d122e1f79e4');
if(isset($_POST['submit'])){
    /* process transaction */
    $result = Braintree_Transaction::sale(array(
     'amount' => '100.00',
     'creditCard' => array(
     'number' => '5454545454545454',
     'expirationDate' => '08/19'
    )
  ));

if ($result->success) {
  print_r("success!: " . $result->transaction->id);
  } else if ($result->transaction) {
    print_r("Error processing transaction:");
    print_r("\n  code: " . $result->transaction->processorResponseCode);
    print_r("\n  text: " . $result->transaction->processorResponseText);
    } else {
      print_r("Validation errors: \n");
      print_r($result->errors->deepAll());
    }
}

// $clientToken = Braintree_ClientToken::generate();


?>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
<script>
  var form = document.querySelector('#payment-form');
  var client_token = "<?= init_payment()->ClientToken()->generate(); ?>";

  braintree.dropin.create({
    authorization: client_token,
    selector: '#bt-dropin',
    paypal: {
      flow: 'vault'
    }
  }, function (createErr, instance) {
    if (createErr) {
      console.log('Create Error', createErr);
      return;
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      instance.requestPaymentMethod(function (err, payload) {
        if (err) {
          console.log('Request Payment Method Error', err);
          return;
        }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
          });
    });
  });
</script>


<html>
  <head>
  </head>
  <body>
    <div id="checkout" method="post" action="/checkout">
      <div id="dropin"></div>
      <input data-braintree-name="number" class="form-control" value="4111111111111111"><br>
      <input data-braintree-name="expiration_date" class="form-control" value="10/20"><br>
      <input type="submit" id="submit" value="Pay">
      <div id="paypal-button"></div>
    </div>  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
  <script>
   braintree.setup(clientToken, "dropin", {
        container: "payment-form",
        form: jQuery("#checkout") , 
        paypal: {
                 container: "payment-form",
                 singleUse: false,
               },
        dataCollector: {
                        paypal: true  
                       },
        paymentMethodNonceReceived: function (event, nonce) {
                 // do something
           }
    });
  </script>

  </body>
</html>        