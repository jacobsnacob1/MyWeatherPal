USE mwp_1;

INSERT INTO notification_category VALUES('daily_pollen','Daily Pollen Numbers','Pollen','None, Low, Medium, High','Daily');
INSERT INTO notification_category VALUES('daily_rain','Daily Rain Change','Rain','Rain % Values','Daily');
INSERT INTO notification_category VALUES('daily_temp','Daily Temperature Numbers','Temperature','High/Low Temperature Values','Daily');
INSERT INTO notification_category VALUES('event_rain_percent','Rain Chance','Rain','Chance exceeds percentage threshold','Conditional');
INSERT INTO notification_category VALUES('event_snow_percent','Snow Chance','Snow','Chance exceeds percentage threshold','Conditional');
INSERT INTO notification_category VALUES('event_temp_hi','Temperature High Threshold','Temperature','Temperature exceeds defined threshold','Conditional');
INSERT INTO notification_category VALUES('event_temp_lo','Temperature Low Threshold','Temperature','Temperature falls below defined threshold','Conditional');
INSERT INTO notification_category VALUES('event_wind_hi','Wind High Threshold','Wind','Speed exceeds value threshold','Conditional');