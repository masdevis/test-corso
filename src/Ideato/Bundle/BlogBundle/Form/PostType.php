<?php

namespace Ideato\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Ideato\CasanoIBundle\Entity\Post;

class PostType extends AbstractType {
    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'Ideato\Bundle\BlogBundle\Entity\Post',
        );
    }
    
    public function buildForm(FormBuilder $builder, array $options) {
        $builder
        ->add('title')
        ->add('content');
    }

    public function getName() {
        return 'post';
    }
}

?>
