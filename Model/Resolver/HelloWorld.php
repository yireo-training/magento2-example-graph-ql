<?php
declare(strict_types=1);

namespace Yireo\ExampleGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

/**
 * Class HelloWorld
 * @package Yireo\ExampleGraphQl\Model\Resolver
 */
class HelloWorld implements ResolverInterface
{
    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|Value|mixed
     * @throws GraphQlInputException
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['name'])) {
            $args['name'] = 'World';
        }

        if ($args['name'] === 'John') {
            throw new GraphQlInputException(__('Please use another name'));
        }

        return [
            'name' => $args['name'],
            'result' => 'Hello, ' . ucfirst($args['name'])
        ];
    }
}
