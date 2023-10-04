<?php
/*
 * ibexadesignbundle.
 *
 * @package   ibexadesignbundle
 *
 * @author    florian
 * @copyright 2018 Novactive
 * @license   https://github.com/Novactive/NovaHtmlIntegrationBundle/blob/master/LICENSE
 */

namespace ErdnaxelaWeb\IbexaDesignIntegration\Pager\Filter;

use Ibexa\Contracts\Core\Repository\Values\Content\Query\Aggregation;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Criterion;
use Ibexa\Contracts\Core\Repository\Values\Content\Search\AggregationResult;
use Symfony\Component\Form\FormBuilderInterface;

interface FilterHandlerInterface
{
    public function getCriterion(string $filterName, string $field, $value): Criterion;

    public function getAggregation(string $filterName, string $field): Aggregation;

    public function addForm(
        FormBuilderInterface $formBuilder,
        string $filterName,
        string $field,
        AggregationResult $aggregationResult
    ): void;
}