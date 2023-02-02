<?php

declare(strict_types=1);

namespace ThriftIntegrationBundle\Serializer\Normalizer;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
//use Thrift\Base\TBase;

class ThriftNormalizer extends AbstractNormalizer
{
    /**
     * @param mixed $data
     * @param string $class
     * @param null $format
     * @param array $context
     *
     * @return object|void
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        throw new \LogicException('Not implemented');
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param null $format
     *
     * @return bool|void
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    /**
     * @param mixed $object
     * @param null $format
     * @param array $context
     *
     * @return array|bool|float|int|null|string
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if (!$this->nameConverter instanceof NameConverterInterface) {
            return $object;
        }

        if (!$this->serializer instanceof NormalizerInterface) {
            throw new \LogicException('Cannot normalize object because injected serializer is not a normalizer');
        }

        $result = [];

        foreach ($object->jsonSerialize() as $k => $v) {
            $result[$this->nameConverter->normalize($k)] = $this->serializer->normalize($v, $format, $context);
        }

        return $result;
    }

    /**
     * @param mixed $data
     * @param null $format
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
//        return $data instanceof TBase && $format === 'json';
    }
}