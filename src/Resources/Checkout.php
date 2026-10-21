<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\CalculatePayload;
use Ignite\ApiClient\Models\CartCalculateResponse;
use Ignite\ApiClient\Models\CartValidateRequest;
use Ignite\ApiClient\Models\CartValidateResponse;
use Ignite\ApiClient\Models\CheckoutBootstrap;
use Ignite\ApiClient\Models\CheckoutSubmitPayload;
use Ignite\ApiClient\Models\CheckoutSubmitResponse;
use Ignite\ApiClient\Models\CountriesResponse;

final class Checkout extends ResourceClient
{
    public function bootstrap(): CheckoutBootstrap
    {
        return CheckoutBootstrap::fromArray($this->requestGet('/checkout/bootstrap'));
    }

    public function countries(): CountriesResponse
    {
        return CountriesResponse::fromArray($this->requestGet('/public/countries'));
    }

    public function validate(CartValidateRequest $request): CartValidateResponse
    {
        return CartValidateResponse::fromArray(
            $this->requestPost('/cart/validate', $request->toArray()),
        );
    }

    public function calculate(CalculatePayload $payload): CartCalculateResponse
    {
        return CartCalculateResponse::fromArray(
            $this->requestPost('/cart/calculate', $payload->toArray()),
        );
    }

    public function submit(CheckoutSubmitPayload $payload): CheckoutSubmitResponse
    {
        return CheckoutSubmitResponse::fromArray(
            $this->requestPost('/checkout', $payload->toArray()),
        );
    }

    // <generated-openapi>
    /**
     * @generated POST /cart/upgrade
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function upgrade(?array $body = null): array
    {
        return parent::requestPost('/cart/upgrade', $body);
    }

    /**
     * @generated POST /checkout/offers/validate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function offers_validate(?array $body = null): array
    {
        return parent::requestPost('/checkout/offers/validate', $body);
    }
    // </generated-openapi>
}
