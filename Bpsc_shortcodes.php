<?php
if(!class_exists('Bpcs_shortcodes')):
    class Bpcs_shortcodes{
        function Bpcs_shortcodes(){
            add_shortcode('bp_profile_displayname', array($this,'bpcs_bp_profile_displayname'));
            add_shortcode('bp_profile_email', array($this,'bpcs_bp_profile_email'));
            add_shortcode('bp_profile_username', array($this,'bpcs_bp_profile_username'));
            add_shortcode('bp_profile_gravatar', array($this,'bpcs_bp_profile_gravatar'));
            add_shortcode('bp_profile_gravatar_url', array($this,'bpcs_bp_profile_gravatar_url'));
            add_shortcode('bp_profile_url', array($this,'bpcs_bp_profile_url'));
            add_shortcode('bp_profile_edit_url', array($this,'bpcs_bp_profile_edit_url'));
            add_shortcode('bp_profile_field', array($this,'bpcs_bp_profile_field'));
        }
        function bpcs_bp_profile_displayname($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            return $user->data->display_name;
        }

        function bpcs_bp_profile_email($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            return $user->data->user_email;
        }

        function bpcs_bp_profile_username($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            return $user->data->user_login;
        }

        function bpcs_bp_profile_gravatar($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0,
                "dimension"=> 90
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            return get_avatar( $user_id, $dimension );
        }

        function bpcs_bp_profile_gravatar_url($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            $email = $user->data->user_email;
            $hash = md5( strtolower( trim ( $email ) ) );
            return 'http://gravatar.com/avatar/' . $hash;
        }

        function bpcs_bp_profile_url($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            return home_url().'/members/'.$user->data->user_login.'/profile/';
        }

        function bpcs_bp_profile_edit_url($atts){
            extract(shortcode_atts(array(
                "user_id"=> 0
            ),$atts));
            global $wpdb,$bp;
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $user = get_userdata( $user_id );
            return home_url().'/members/'.$user->data->user_login.'/profile/edit/';
        }

        function bpcs_bp_profile_field($atts){
            extract(shortcode_atts(array(
                "field"=> '',
                "tab"  => 'Base',
                "user_id" => 0,
                "empty" => 'Empty Field',
                "shortcode" => 0
            ),$atts));
            global $wpdb,$bp;
            $prefix = $wpdb->prefix;
            $grp = $wpdb->get_var("SELECT id FROM ".$prefix."bp_xprofile_groups WHERE name='$tab'");

            if(empty($grp)){ return 'Tab Name is invalid';}
            $fld = $wpdb->get_var("SELECT id FROM ".$prefix."bp_xprofile_fields WHERE name='$field' AND group_id=$grp");
            if(empty($fld)) return 'Field Name is invalid';
            if( is_string($user_id) ) $user_id = $wpdb->get_var("SELECT ID FROM ".$wpdb->users." WHERE user_login='$user_id'") ;
            elseif($user_id == 0) $user_id = (isset($bp->loggedin_user->userdata->ID))? $bp->loggedin_user->userdata->ID : get_current_user_id() ;
            $value = $wpdb->get_var("SELECT value FROM ".$prefix."bp_xprofile_data WHERE field_id=$fld AND user_id=$user_id");
            if($wpdb->get_var("SELECT type FROM ".$prefix."bp_xprofile_fields WHERE id=$fld") == 'custom_area')
                $value = $wpdb->get_var("SELECT name FROM ".$prefix."bp_xprofile_fields WHERE parent_id=$fld AND option_order=2");

            $value = preg_replace(array("/\r\n/s", "/\n/s", "/\r/s"),'<br>',$value);
            if($shortcode == 1) $value = do_shortcode($value);


            if(empty($value)) return $empty;
            return $value;
        }
    }
endif;