<?php

try {
    // using ldap bind
    $ldaprdn  = 'CN=suporte 01,OU=CHIAOMIBR,DC=tcc,DC=local';     // ldap rdn or dn
    $ldappass = 'T1sup0rt&';  // associated password

    // connect to ldap server
    $ldapconn = ldap_connect("192.168.74.177")
            or die("Could not connect to LDAP server.");

    // Set some ldap options for talking to
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
   // ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

    if ($ldapconn) {

            // binding to ldap server
            $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

            // verify binding
            if ($ldapbind) {
                echo "LDAP bind successful...\n";
            } else {
                echo "LDAP bind failed...\n";
            }

    }
} catch (Exception $ex) {
    print_r($ex);
}