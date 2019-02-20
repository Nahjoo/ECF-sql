<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190205130417 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE spare_part (id INT AUTO_INCREMENT NOT NULL, piece_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spare_part_type_instrument (spare_part_id INT NOT NULL, type_instrument_id INT NOT NULL, INDEX IDX_BF2EDE1349B7A72 (spare_part_id), INDEX IDX_BF2EDE137C1CAAA9 (type_instrument_id), PRIMARY KEY(spare_part_id, type_instrument_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family_instrument (id INT AUTO_INCREMENT NOT NULL, family_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F75BAA22A54DC22 (family_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mark (id INT AUTO_INCREMENT NOT NULL, mark_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6674F2718B8415E3 (mark_name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_instrument (id INT AUTO_INCREMENT NOT NULL, family_instrument_id INT DEFAULT NULL, mark_id INT DEFAULT NULL, instrument_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_21BCBFF889BCCDAE (instrument_name), INDEX IDX_21BCBFF882F88FB0 (family_instrument_id), INDEX IDX_21BCBFF84290F12B (mark_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spare_part_type_instrument ADD CONSTRAINT FK_BF2EDE1349B7A72 FOREIGN KEY (spare_part_id) REFERENCES spare_part (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spare_part_type_instrument ADD CONSTRAINT FK_BF2EDE137C1CAAA9 FOREIGN KEY (type_instrument_id) REFERENCES type_instrument (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF882F88FB0 FOREIGN KEY (family_instrument_id) REFERENCES family_instrument (id)');
        $this->addSql('ALTER TABLE type_instrument ADD CONSTRAINT FK_21BCBFF84290F12B FOREIGN KEY (mark_id) REFERENCES mark (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE spare_part_type_instrument DROP FOREIGN KEY FK_BF2EDE1349B7A72');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF882F88FB0');
        $this->addSql('ALTER TABLE type_instrument DROP FOREIGN KEY FK_21BCBFF84290F12B');
        $this->addSql('ALTER TABLE spare_part_type_instrument DROP FOREIGN KEY FK_BF2EDE137C1CAAA9');
        $this->addSql('DROP TABLE spare_part');
        $this->addSql('DROP TABLE spare_part_type_instrument');
        $this->addSql('DROP TABLE family_instrument');
        $this->addSql('DROP TABLE mark');
        $this->addSql('DROP TABLE type_instrument');
    }
}
