<?php
class DefaultLang {
    public function __construct() {
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "Bine ai venit la lista de banuri a serverului {server}";
        $array["index.welcome.sub"] = "Aici sunt enumerate toate pedepsele noastre.";
        $array["title.index"] = 'Acasa';
        $array["title.bans"] = 'Banuri';
        $array["title.mutes"] = 'Amutiri';
        $array["title.warnings"] = 'Avertizari';
        $array["title.kicks"] = 'Kickuri';
        $array["title.player-history"] = "Pedepse recente pentru {name}";
        $array["title.staff-history"] = "Pedepse recente de catre {name}";
        $array["page.expired.ban"] = '(Unbanat)';
        $array["page.expired.ban-by"] = '(Unbanat de catre {name})';
        $array["page.expired.mute"] = '(Unmuted)';
        $array["page.expired.mute-by"] = '(Unmuted de catre {name})';
        $array["page.expired.warning"] = '(Expirat)';
        $array["generic.ban"] = "Ban";
        $array["generic.mute"] = "Amutire";
        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];
        $array["generic.warn"] = "Advertisment";
        $array["generic.kick"] = "Kick";
        $array["generic.type"] = "Tip";
        $array["generic.active"] = "Activ";
        $array["generic.inactive"] = "Inactiv";
        $array["generic.permanent"] = "Permanent";
        $array["generic.player-name"] = "Jucator";
        $array["table.player"] = $array["generic.player-name"];
        $array["table.executor"] = "Moderator";
        $array["table.reason"] = "Motiv";
        $array["table.date"] = "Data";
        $array["table.expires"] = "Expira";
        $array["table.server.name"] = "Server";
        $array["table.server.scope"] = "Server Scop";
        $array["table.server.origin"] = "Origin Server";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Pagina";
        $array["action.check"] = "Verifica";
        $array["action.return"] = "Inapoi la {origin}";
        $array["warnings.received"] = "Advertisment primit";
        $array["error.missing-args"] = "Lipsesc argumente.";
        $array["error.name.unseen"] = "{name} nu a mai jucat inainte.";
        $array["error.name.invalid"] = "Nume invalid.";
        $array["history.error.uuid.no-result"] = "Nicio pedeapsa gasita.";
        $array["info.error.id.no-result"] = "Eroare: {type} nu a fost gasit in baza de date.";
        //Custom Added by GlareMasters's Material Design Addon
        $array["contact_button"] = "Contactati-ne";
        $array["ban_appeal"] = "Cerere de unban";
        $array["players_online"] = "Jucatori online:";
        $array["credits"] = "Credite";
        $array["github"] = "GitHub";
        $array["litebans"] = "LiteBans";
        $array["glare"] = "GlareMasters";
        $array["join"] = "Intra";
        $array["others"] = "altii pe";
	    $array["version"] = "Versiune: ";
	    $array["version_latest"] = "Cea mai recenta";
	    $array["click_for_latest_version"] = "Click aici pentru cea mai recenta versiune";
        $array["query_not_enabled"] = "Querying is not enabled in your spigot.yml";
    }
}
