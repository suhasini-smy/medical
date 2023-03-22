DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getpatientData`()
    NO SQL

BEGIN

SET @query =  'SELECT * FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCategoriesData`()
    NO SQL

BEGIN

SET @query =  'SELECT * FROM `categories` where is_active=1 ';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getActivePatientData`()
    NO SQL

BEGIN

    SET @query =  'SELECT count(*) as records FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 and  p.is_active=1';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInActivePatientData`()
    NO SQL

BEGIN

    SET @query =  'SELECT count(*) as records FROM `patient` as p inner join categories as c on p.category_id=c.category_id where c.is_active=1 and  p.is_active=0';

    PREPARE STMT FROM @query;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END ;;
DELIMITER ;


UPDATE `patient` SET `is_active`='1';
ALTER TABLE `patient` CHANGE `patient_gender` `patient_gender` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1=>male,2=>female';
ALTER TABLE `patient` CHANGE `patient_lname` `patient_lname` VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;

ALTER TABLE `patient` CHANGE `created_at` `created_at` DATE NULL DEFAULT NULL, CHANGE `updated_at` `updated_at` DATE NULL DEFAULT NULL;
CREATE USER 'root'@'localhost' IDENTIFIED WITH authentication_plugin BY 'root@123';
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root@123';

GRANT ALL PRIVILEGES ON *.* TO  'root'@'localhost' WITH GRANT OPTION;


DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPeteintDetails`(IN `patient_fname` VARCHAR(2050), IN `patient_lname` VARCHAR(2050), IN `patient_dob` VARCHAR(2050), IN `patient_gender` VARCHAR(2050), IN `category_id` VARCHAR(2050), IN `patient_number` VARCHAR(2050))
    NO SQL
BEGIN

SET @v_patient_fname = `patient_fname`;
SET @v_patient_lname=patient_lname;
SET @v_patient_dob=patient_dob;
SET @v_category_id=category_id;
SET @v_patient_gender=patient_gender;
SET @v_patient_number=patient_number;

        INSERT INTO categories (
                                    patient_fname,
                                    patient_lname,
                                    patient_dob,
                                    category_id,
                                    patient_gender,
                                    patient_number,
                                    is_active,
                                    created_at,
                                    updated_at
                                )
                        VALUES (
                                @v_patient_fname,
                                @v_patient_lname,
                                @v_patient_dob,
                                @v_category_id,
                                @v_patient_gender,
                                @v_patient_number,
                                1,
                                CURRENT_TIMESTAMP,
                                NULL
                            );
END ;;
DELIMITER ;
