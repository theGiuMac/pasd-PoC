<!DOCTYPE html>
<html>
  <head>
    <title>Customer Page</title>
    <link rel="stylesheet" type="text/css" href="./styles/dark.css">
    <h1 style="position:absolute;top:50px;">Welcome Customer!</h1>
</head>


  <body>
     <button class="btn btn-primary btn-block" onclick="pay(100)">Pay 100 dollars.</button>
     </form>
     </div>
     </div>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
     <script src="https://checkout.stripe.com/checkout.js"></script>
     <script type="text/javascript">
     function pay(amount) {
         var handler = StripeCheckout.configure({
                 key: 'pk_test_51KJtRjJFlCk5ix0ihUV5TDJtHLe5fEGh0M4pMazmnd7hl8mhlB1yY1V1LQGQaTcRpMDQFdn1EyJ2Nt7xLJiCtFuz003SPnrjUq', // your publisher key id
                     locale: 'auto',
                     token: function (token) {
     // You can access the token ID with `token.id`.
     // Get the token ID to your server-side code for use.
                         console.log('Token Created!!');
                         console.log(token)
                                $('#token_response').html(JSON.stringify(token));
                         $.ajax({
                                 url:"payment.php",
                          method: 'post',
                          data: { tokenId: token.id, amount: amount },
                          dataType: "json",
                          success: function( response ) {
                              console.log(response.data);
                              $('#token_response').append( '<br />' + JSON.stringify(response.data));
                          }
                          })
                          }
                     });
         handler.open({
                 name: 'Demo Site',
                description: '2 widgets',
                amount: amount * 100
                });
     }
     </script>
  </body>
</html>
