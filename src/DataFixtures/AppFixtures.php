<?php
namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Exercise;
use App\Entity\Gainage;
use App\Entity\Musculation;
use App\Entity\Fitness;
use App\Entity\TitresFit;
use App\Entity\TitresGainage;
use App\Entity\TitresMuscu;
use App\Entity\Training;
use DateTime;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $encodeur;

    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {

        $user1 = (new User())->setEmail("100@gm.fr");
        $HashedPassword = $this->encoder->hashPassword($user1, "pass");
        $user1->setPassword($HashedPassword);
        $manager->persist($user1);

        $user2 = (new Admin())->setEmail("200@gm.fr");
        $HashedPassword = $this->encoder->hashPassword($user2, "pass");
        $user2->setPassword($HashedPassword);
        $manager->persist($user2);

        $gainage = (new TitresGainage)->setName("Titlegainage");
        $manager->persist($gainage);

        $muscu = (new TitresMuscu)->setName("TitleMuscu");
        $manager->persist($muscu);

        $fit = (new TitresFit)->setName("TitleFit");
        $manager->persist($fit);

        $exogainage  = (new Gainage)-> setName($gainage)->setPoids("2")->setNombre("20")->setActif("true");
        $exomuscu = (new Musculation)-> setName($muscu)->setPoids('10')->setNombre("20");
        $exofit = (new Fitness)->setName($fit)->setDurée("2")->setVitesse("15")->setNombrePas("1800");
        $manager->persist($exogainage);
        $manager->persist($exofit);
        $manager->persist($exomuscu);

        $training = (new Training)-> setDate(new Datetime ("2022-03-16"))->setPerson($user1)->addExercise($exogainage)->addExercise($exomuscu)->addExercise($exofit);

        $manager->flush();

    }
}