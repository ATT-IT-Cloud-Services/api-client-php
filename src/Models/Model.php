<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

abstract readonly class Model
{
    /** @param array<string, mixed> $data */
    abstract public static function fromArray(array $data): static;

    /** @return array<string, mixed> */
    abstract public function toArray(): array;

    protected static function string(array $data, string $key): string
    {
        $value = $data[$key] ?? null;
        if (!is_string($value)) {
            throw new \InvalidArgumentException("Expected string at {$key}");
        }

        return $value;
    }

    protected static function nullableString(array $data, string $key): ?string
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }
        if (!is_string($data[$key])) {
            throw new \InvalidArgumentException("Expected string|null at {$key}");
        }

        return $data[$key];
    }

    protected static function bool(array $data, string $key): bool
    {
        $value = $data[$key] ?? null;
        if (!is_bool($value)) {
            throw new \InvalidArgumentException("Expected bool at {$key}");
        }

        return $value;
    }

    protected static function nullableBool(array $data, string $key): ?bool
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }
        if (!is_bool($data[$key])) {
            throw new \InvalidArgumentException("Expected bool|null at {$key}");
        }

        return $data[$key];
    }

    protected static function float(array $data, string $key): float
    {
        $value = $data[$key] ?? null;
        if (!is_int($value) && !is_float($value)) {
            throw new \InvalidArgumentException("Expected number at {$key}");
        }

        return (float) $value;
    }

    protected static function nullableFloat(array $data, string $key): ?float
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }
        if (!is_int($data[$key]) && !is_float($data[$key])) {
            throw new \InvalidArgumentException("Expected number|null at {$key}");
        }

        return (float) $data[$key];
    }

    protected static function int(array $data, string $key): int
    {
        $value = $data[$key] ?? null;
        if (!is_int($value) && !(is_float($value) && (float) (int) $value === $value)) {
            throw new \InvalidArgumentException("Expected int at {$key}");
        }

        return (int) $value;
    }

    protected static function nullableInt(array $data, string $key): ?int
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }

        return self::int($data, $key);
    }

    /**
     * @param list<string> $knownKeys
     * @return array<string, mixed>
     */
    protected static function extra(array $data, array $knownKeys): array
    {
        $extra = $data;
        foreach ($knownKeys as $key) {
            unset($extra[$key]);
        }

        return $extra;
    }
}
