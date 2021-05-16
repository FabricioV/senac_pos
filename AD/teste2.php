<?php

try {
   function auth($username, $password, $domain = 'tcc', $endpoint = 'ldap://192.168.74.177', $dc = 'dc=tcc,dc=local') {
	$ldap = @ldap_connect($endpoint);
	if(!$ldap) return 'erro';

	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	$bind = @ldap_bind($ldap, "$domain\\$username", $password);
	if(!$bind) return 'erro';

	$result = @ldap_search($ldap, $dc, "(sAMAccountName=$username)");
	if(!$result) return false;

	@ldap_sort($ldap, $result, 'sn');
	$info = @ldap_get_entries($ldap, $result);
	if(!$info) return false;
	if(!isset($info['count']) || $info['count'] !== 1) return false;

	$data = [];

	foreach($info[0] as $key => $value) {
		if(is_numeric($key)) continue;
		if($key === 'count') continue;

		$data[$key] = (array)$value;
		unset($data[$key]['count']);
	}

	return [
		//'mail' => $data['mail'][0],
		'displayname' => $data['displayname'][0]
	];
}

print_r(auth("suporte01", "T1sup0rt&"));



} catch (Exception $ex) {
    print_r($ex);
}