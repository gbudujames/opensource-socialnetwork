<?php
/**
 *    OpenSource-SocialNetwork
 *
 * @package   (Informatikon.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://opensource-socialnetwork.com/licence
 * @link      http://www.opensource-socialnetwork.com/licence
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/system/start.php');

?>
<div class="layout-installation">
    <h2> <?php echo ossn_installation_print('create:admin:account'); ?> </h2>

    <form action="<?php echo ossn_installation_paths()->url; ?>?action=account" method="post">
        <div>
            <input type="text" name="firstname" placeholder="First Name"/>
            <input type="text" name="lastname" placeholder="Last Name"/>
        </div>

        <div>
            <input type="text" name="email" placeholder="Email"/>
            <input name="email_re" type="text" placeholder="Re-enter Email"/>
        </div>

        <div>
            <input type="text" name="username" placeholder="Username" class="long-input"/>
            <input type="password" name="password" placeholder="Password" class="long-input"/>
        </div>
        <div>
            <label><?php echo ossn_print('birthdate'); ?> </label>

            <select name="birthday">
                <?php if (!empty($birthdate)) { ?>
                    <option value="<?php echo $birthdate[0]; ?>"> <?php echo $birthdate[0]; ?> </option>
                <?php } ?>
                <option value=""><?php echo ossn_print('day'); ?></option>
                <?php for ($day = 1; $day <= 31; $day++) { ?>
                    <option
                        value="<?php echo strlen($day) == 1 ? '0' . $day : $day; ?>"><?php echo strlen($day) == 1 ? '0' . $day : $day; ?></option>
                <?php } ?>
            </select>

            <select name="birthm">
                <?php if (!empty($birthdate)) { ?>
                    <option value="<?php echo $birthdate[1]; ?>"> <?php echo $birthdate[1]; ?> </option>
                <?php } ?>
                <option value=""><?php echo ossn_print('month'); ?></option>
                <?php for ($month = 1; $month <= 12; $month++) { ?>
                    <option
                        value="<?php echo strlen($month) == 1 ? '0' . $month : $month; ?>"><?php echo strlen($month) == 1 ? '0' . $month : $month; ?></option>
                <?php } ?>
            </select>

            <select name="birthy">
                <?php if (!empty($birthdate)) { ?>
                    <option value="<?php echo $birthdate[2]; ?>"> <?php echo $birthdate[2]; ?> </option>
                <?php } ?>
                <option value=""><?php echo ossn_print('year'); ?></option>
                <?php for ($year = date('Y'); $year > date('Y') - 100; $year--) { ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php } ?>
            </select>

        </div>
        <br/>

        <div>
            <label> Gender </label>
            <span><input type="radio" name="gender" value="male"/> <?php echo ossn_print('male'); ?></span>
            <span><input type="radio" name="gender" value="female"/> <?php echo ossn_print('female'); ?></span>
        </div>
        <br/>
        <input type="submit" value="Install" class="button-blue primary"/>

        </from>
    </form>