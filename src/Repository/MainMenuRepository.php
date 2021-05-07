<?php

namespace App\Repository;

use App\Entity\MainMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MainMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method MainMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method MainMenu[]    findAll()
 * @method MainMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MainMenuRepository extends ServiceEntityRepository
{
    static public function setMenuActive(array $menu, string $controllerName)
    {
        foreach ($menu as &$item)
            if ($item["titlePage"] == $controllerName)
                $item["isActive"] = true;
        return $menu;
    }

    static public function getMenuJson($doctrine)
    {
        $mainMenuItem = $doctrine->getRepository(MainMenu::class)->getAllMenu();

        $ret = array();
        foreach ($mainMenuItem as $item) {
            if ($item->getIsTitle()) {
                array_push($ret, self::setItemValue($item, false, true, false));
            } else if ($item->getIsMenu()) {
                $menu = self::setItemValue($item, true, false, false);
                foreach ($mainMenuItem as $children) {
                    if ($children->getParentId() == $item->getId() && !$children->getIsMenu()) {
                        array_push($menu["children"], self::setItemValue($children, false, false, false));
                    }
                }
                array_push($ret, $menu);
            } else if ($item->getParentId() == 0) {
                array_push($ret, self::setItemValue($item, false, false, false));
            }
        }
        return $ret;
    }

    static private function setItemValue($item, bool $isMenu, bool $isTitle, bool $isActive) {
        return array(
            "name" => $item->getName(),
            "url" => $item->getUrl(),
            "displayed" => $item->getDisplayed(),
            "icon" => $item->getIcon(),
            "class" => $item->getClass(),
            "titlePage" => $item->getTitlePage(),
            "titleMenu" => $item->getTitleMenu(),
            "isMenu" => $isMenu,
            "children" => array(),
            "isTitle" => $isTitle,
            "isActive" => $isActive
        );
    }

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainMenu::class);
    }

    public function getAllMenu(): array
    {
        return $this->createQueryBuilder('mm')
            ->orderBy('mm.ordered')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return MainMenu[] Returns an array of MainMenu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MainMenu
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
