<?php require_once('inc/controllers/process.php'); ?>
<?php require_once('inc/views/header.php'); ?>
    
<section ng-controller="MyController" id="wrapper">
    
    <div class="pt-page pt-page-5" itemscope="itemscope" itemtype="https://schema.org/ContactPage">
        
    <?php if(isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
    
    <h2 ng-repeat="input in messages">{{ input.success }}!</h2>
    
    <?php } else { ?>
    
        <h1 class="head-title">Contact Form Application</h1>
        
        <form id="contact-form" method="post" action="index.php" ng-controller="MyController">
            
            <table ng-repeat="input in contactForm">
                <tbody>
                    <tr>
                        <td><label for="name">{{ input.field1 }}</label><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td><label for="email">{{ input.field2 }}</label><input type="text" name="email"></td>
                    </tr>
                    <tr class="contact-radio">
                        <td><label for="development">Web Development</label><input type="radio" name="services" checked="checked" value="web development"></td>
                        <td><label for="marketing">SEO Marketing</label><input type="radio" name="services" value="seo marketing"></td>
                        <td><label for="both">Both</label><input type="radio" name="services" value="both"></td>
                    </tr>
                    <tr>
                        <td><label for="subject">{{ input.field3 }}</label><input type="text" name="subject"></td>
                    </tr>
                    <tr>
                        <td><label for="message">{{ input.field4 }}</label><textarea name="message"></textarea></td>
                    </tr>
                    <tr ng-controller="Errors" style="display:none;">
                        <td ng-repeat="input in messages">
                            <label for="address">Address</label><input type="text" name="address">
                            <h1>{{ input.spam }}</h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <input class="contact-submit" type="submit" value="send">
            
        </form>
<?php } ?>
       
    </div>

</section>
<?php require_once('inc/views/footer.php'); ?>