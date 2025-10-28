<?php

namespace App\Service\Modules;

use App\Entity\EvcGaleriaKepek;
use Doctrine\ORM\EntityManagerInterface;

class GalleryService
{
    protected array $galleryItems;
    public function __construct(
        protected EntityManagerInterface $entityManager,
        protected LangService $langService
    ){
        $this->galleryItems = $this->entityManager
            ->getRepository(EvcGaleriaKepek::class)
            ->findBy([], ['galeria_kepek_sorrend' => 'ASC']);
    }

    public function galleryText(string $id): string
    {
        $result = "<div class='elite-gallery' data-controller='lightbox'>";
        foreach ($this->galleryItems as $item) {
            if($item->getGaleriaKepekGaleriaId() == $id){
                $result .="
					<a rel='kepek' data-sub-html='#caption".$item->getId()."' class=' effect-hover9' href='".$_ENV['CDN']."assets/uploaded_images/gallery/".$item->getGaleriaKepekKepnev()."'>
						<picture>
							<source type='image/webp' srcset='".$_ENV['CDN']."assets/uploaded_images/gallery/".$item->getGaleriaKepekKepnevCropped().".webp'>
							<source type='image/jpg' srcset='".$_ENV['CDN']."assets/uploaded_images/gallery/".$item->getGaleriaKepekKepnevCropped()."'>
							<img loading='lazy' width='".$_ENV['galW']."' height='".$_ENV['galH']."' class='img-fluid' 
								src='".$_ENV['CDN']."assets/uploaded_images/gallery/".$item->getGaleriaKepekKepnevCropped()."' 
								title='".$item->getGaleriaKepekFelirat()."' 
								alt='".$item->getGaleriaKepekAlt()."'/>
						</picture>
						<div id='caption".$item->getId()."'>".$item->getGaleriaKepekFelirat()."</div>
					</a>
				";
            }
        }
        $result.="</div>";

        return $result;
    }
}