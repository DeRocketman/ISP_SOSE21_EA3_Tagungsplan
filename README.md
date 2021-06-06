# ISP-EA3-Tagungsplan
Objektorientierte Programmierung und Reguläre Ausdrücke

Kapitel 1-7 sollen zuvor bearbeitet worden sein.

Ziel dieser Aufgabe:
Sie sollen zeigen, dass Sie die objektorientierte PHP-Programmierung und
reguläre Ausdrücke verstanden haben.

Aufgabe:
Es ist ein Plan für eine zweitägige Tagung zu programmieren.

Zur Vorbereitung sollen Sie eine JSON-Datei erstellen, die den Tagungsnamen,
einen Begrüßungstext und den Raumnamen sowie zwei zusammenhängende Tage in
der Zukunft enthält. Überlegen Sie sich außerdem, wie Sie die einzelnen
Zeiteinträge speichern wollen.

Auf der ersten Seite soll die JSON-Datei ausgelesen werden und die Raumnummer
(oder der Raumname) ausgegeben werden. Wenn schon Termine an den Tagen vorhanden
sind, dann sollen diese ebenfalls mit angezeigt werden. Beim erstmaligen Aufruf
werden aber noch keine Termine eingetragen sein. Durch Auswahl eines Tages
(via Link oder Button) gelangt man dann auf die zweite Seite, auf der für das
ausgewählte Datum Zeiten eingetragen werden können (z.B. 9:00 - 9:30 Eröffnung
  der Tagung, Prof. Dr. Kaiser und Prof. Dr. König).

Von der zweiten Seite kann man wieder zurück auf die erste Seite kommen
(via Link oder Button) und bekommt die gesamte Übersicht über das Tagungsprogramm.

Zeichnen Sie die Anwendung zuerst auf Papier und überlegen Sie sich,
was Sie programmieren müssen und in welcher Reihenfolge Sie vorgehen.
Überlegen Sie außerdem, welche Klassen und Methoden Sie benötigen und
zeichnen Sie das Klassendiagramm bevor Sie mit der Programmierung beginnen.

Die Anwendung ist objektorientiert zu programmieren. Das Hauptprogramm
soll möglichst übersichtlich sein. Uhrzeiten (z.B. 9:00 - 9:30),
Veranstaltungsname (z.B. Eröffnung der Tagung) und Redner
(z.B. Prof. Dr. Kaiser und Prof. Dr. König) sollen in
getrennten Feldern abgespeichert werden. Vor dem Speichern sind die Einträge
mittels (selbst definierter) regulärer Ausdrücke zu überprüfen.

Abgabe:
Einzureichen sind alle zur Anwendung
zugehörigen Dateien inklusive der JSON-Datei und dem Klassendiagramm.
Der Code soll, wie im Kursmaterial (5.2.3-5.2.5) erläutert, dokumentiert
sein und den Konventionen folgen.
