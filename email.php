
<form action="https://api.web3forms.com/submit" method="post">

    <!-- Replace with your Access Key -->
    <input type="hidden" name="access_key" value="df6388b3-e8d5-47e8-853c-868a3eb9840d">

    <!-- Form Inputs. Each input must have a name="" attribute -->
    <input type="text" name="name" required>
    <input type="email" name="email" required>
    <textarea name="message" required></textarea>

    <!-- Honeypot Spam Protection -->
    <input type="checkbox" name="botcheck" class="hidden" style="display: none;">

    <!-- Custom Confirmation / Success Page -->
    <!-- <input type="hidden" name="redirect" value="https://mywebsite.com/thanks.html"> -->

    <button type="submit" onclick="alert('yayy')" name="submit">Submit Form</button>

</form>
<script>
    function func(){
        <?php
        if(isset($_post['submit'])){
            echo "<script>alert('yayy')</script>";
        }  
        ?>
    }
</script>
