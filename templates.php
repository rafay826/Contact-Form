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