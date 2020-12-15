
<html>
<title>Pay with Bolmapay</title>    
    
    <form action="pay.php" method="POST">
        
        
        <label>Fullname</label>
        <input type="text" name="fullname" required>
        <br/>
        
        <label>Phone</label>
        <input type="text" name="phone" required>
           <br/>
        
        <label>Email</label>
        <input type="email" name="Email" required>
           <br/>
        
        <label>Amount</label>
        <input type="number" name="amount" required>
           <br/>
         
         <button name="pay_now" type="submit">Pay Now</button>
           
        
    </form>

</html>