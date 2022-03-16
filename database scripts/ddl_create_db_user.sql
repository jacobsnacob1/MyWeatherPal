USE mwp_1;


CREATE USER 'db_user'@'%' IDENTIFIED BY '$7WC_SvzF+-K,k.5Xh4~';

GRANT SELECT, INSERT, UPDATE ON mwp_1.billing_address TO db_user;
GRANT SELECT, INSERT, UPDATE ON mwp_1.notification TO db_user;
GRANT SELECT, INSERT, UPDATE ON mwp_1.passwords TO db_user;
GRANT SELECT, INSERT, UPDATE ON mwp_1.person TO db_user;
GRANT SELECT, INSERT, UPDATE ON mwp_1.settings TO db_user;

GRANT SELECT ON mwp_1.notification_category TO db_user;
GRANT SELECT ON mwp_1.zip_code TO db_user;

FLUSH PRIVILEGES;



