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

namespace ErdnaxelaWeb\IbexaDesignIntegration\Transformer\FieldValue;

use Ibexa\Contracts\Core\Repository\Values\Content\Content;
use Ibexa\Contracts\Core\Repository\Values\ContentType\FieldDefinition;
use Ibexa\Contracts\FieldTypeRichText\RichText\Converter as RichTextConverterInterface;

class RichtextFieldValueTransformer implements FieldValueTransformerInterface
{
    public function __construct(
        protected RichTextConverterInterface $richTextOutputConverter,
    ) {
    }

    public function transformFieldValue(
        Content $content,
        string $fieldIdentifier,
        FieldDefinition $fieldDefinition
    ) {
        /** @var \Ibexa\FieldTypeRichText\FieldType\RichText\Value $fieldValue */
        $fieldValue = $content->getFieldValue($fieldIdentifier);
        return $this->richTextOutputConverter->convert($fieldValue->xml)
            ->saveHTML();
    }
}