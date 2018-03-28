<?php

class Lang {
    public function __construct() {
        $array = array();
        $this->array = &$array;
        $array["index.welcome.main"] = "Willkommen auf {server}s Bann-Liste.";
        $array["index.welcome.sub"] = "Hier sind alle Bestrafungen aufgelistet.";

        $array["title.index"] = 'Home';
        $array["title.bans"] = 'Banns';
        $array["title.mutes"] = 'Mutes';
        $array["title.warnings"] = 'Warnungen';
        $array["title.kicks"] = 'Kicks';
        $array["title.player-history"] = "Aktuellste Bestrafungen für {name}";
        $array["title.staff-history"] = "Aktuellste Bestrafungen von {name}";

        $array["page.expired.ban"] = '(Entbannt)';
        $array["page.expired.ban-by"] = '(Entbannt von {name})';
        $array["page.expired.mute"] = '(Entmuted)';
        $array["page.expired.mute-by"] = '(Entmuted von {name})';
        $array["page.expired.warning"] = '(Abgelaufen)';

        $array["generic.ban"] = "Bann";
        $array["generic.mute"] = "Mute";
        $array["generic.ipban"] = "IP-" . $array["generic.ban"];
        $array["generic.ipmute"] = "IP-" . $array["generic.mute"];
        $array["generic.warn"] = "Warnung";
        $array["generic.kick"] = "Kick";
        $array["generic.type"] = "Typ";
        $array["generic.active"] = "Aktiv";
        $array["generic.inactive"] = "Inaktiv";
        $array["generic.permanent"] = "Permanenter";
        $array["generic.player-name"] = "Spieler";

        $array["table.player"] = $array["generic.player-name"];
        $array["table.executor"] = "Moderator";
        $array["table.reason"] = "Grund";
        $array["table.date"] = "Datum";
        $array["table.expires"] = "Läuft ab am";

        $array["table.server.name"] = "Server";
        $array["table.server.scope"] = "Server-Umfang";
        $array["table.server.origin"] = "Ursprungsserver";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Seite";

        $array["action.check"] = "Überprüfen";
        $array["action.return"] = "Zurück zu {origin}";

        $array["warnings.received"] = "Warnung erhalten";

        $array["error.missing-args"] = "Es fehlen Parameter.";
        $array["error.name.unseen"] = "{name} wurde noch nie gesehen.";
        $array["error.name.invalid"] = "Ungültiger Name.";
        $array["history.error.uuid.no-result"] = "Keine Bestrafungen gefunden.";
        $array["info.error.id.no-result"] = "Fehler: {type} wurde nicht in der Datenbank gefunden.";

        //Custom Added by GlareMasters's Material Design Addon
        $array["contact_button"] = "Kontaktiere uns";
        $array["ban_appeal"] = "Ungerecht gebannt?";
        $array["players_online"] = "Spieler online:";
        $array["credits"] = "Über";
        $array["github"] = "GitHub";
        $array["litebans"] = "LiteBans";
        $array["glare"] = "GlareMasters";
        $array["join"] = "Spiele mit";
        $array["others"] = "anderen Spielern auf";
	    $array["version"] = "Version: ";
	    $array["version_latest"] = "Neueste";
	    $array["click_for_latest_version"] = "Klicke hier um die neueste Version zu installieren";
        $array["query_not_enabled"] = "Querying ist nicht aktiv in den Server-Einstellungen (server.properties)!";
    }
}
