<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

use Ignite\ApiClient\Resources\Auth;
use Ignite\ApiClient\Resources\Services;
use Ignite\ApiClient\Resources\Billing;
use Ignite\ApiClient\Resources\Checkout;
use Ignite\ApiClient\Resources\Shop;
use Ignite\ApiClient\Resources\Dashboard;
use Ignite\ApiClient\Resources\Domains;
use Ignite\ApiClient\Resources\Subdomains;
use Ignite\ApiClient\Resources\IpManager;
use Ignite\ApiClient\Resources\SshKeys;
use Ignite\ApiClient\Resources\Support;
use Ignite\ApiClient\Resources\User;
use Ignite\ApiClient\Resources\Wallet;
use Ignite\ApiClient\Resources\Business;
use Ignite\ApiClient\Resources\Affiliates;
use Ignite\ApiClient\Resources\Family;
use Ignite\ApiClient\Resources\Byoip;
use Ignite\ApiClient\Resources\FloatingIps;
use Ignite\ApiClient\Resources\Addresses;
use Ignite\ApiClient\Resources\BlogPosts;
use Ignite\ApiClient\Resources\Byoas;
use Ignite\ApiClient\Resources\CaseReports;
use Ignite\ApiClient\Resources\Container;
use Ignite\ApiClient\Resources\Coupons;
use Ignite\ApiClient\Resources\Documents;
use Ignite\ApiClient\Resources\Events;
use Ignite\ApiClient\Resources\Health;
use Ignite\ApiClient\Resources\Integrations;
use Ignite\ApiClient\Resources\Newsletter;
use Ignite\ApiClient\Resources\OpenApi;
use Ignite\ApiClient\Resources\Permissions;
use Ignite\ApiClient\Resources\Ping;
use Ignite\ApiClient\Resources\Plus;
use Ignite\ApiClient\Resources\Preorders;
use Ignite\ApiClient\Resources\PublicApi;
use Ignite\ApiClient\Resources\PublicSettings;
use Ignite\ApiClient\Resources\Storage;
use Ignite\ApiClient\Resources\Team;
use Ignite\ApiClient\Resources\ThemeAssets;
use Ignite\ApiClient\Resources\Traffic;
use Ignite\ApiClient\Resources\Webhooks;

/**
 * Official ignite API client.
 *
 * Resource namespaces follow the public OpenAPI document
 * (host-root paths, e.g. /services — not legacy /api/services).
 * Failures throw ApiException with machine-readable code, HTTP status, and raw payload.
 */
final class IgniteClient
{
    private readonly HttpTransport $transport;

    public readonly Auth $auth;
    public readonly Services $services;
    public readonly Billing $billing;
    public readonly Checkout $checkout;
    public readonly Shop $shop;
    public readonly Dashboard $dashboard;
    public readonly Domains $domains;
    public readonly Subdomains $subdomains;
    public readonly IpManager $ipManager;
    public readonly SshKeys $sshKeys;
    public readonly Support $support;
    public readonly User $user;
    public readonly Wallet $wallet;
    public readonly Business $business;
    public readonly Affiliates $affiliates;
    public readonly Family $family;
    public readonly Byoip $byoip;
    public readonly FloatingIps $floatingIps;
    public readonly Addresses $addresses;
    public readonly BlogPosts $blogPosts;
    public readonly Byoas $byoas;
    public readonly CaseReports $caseReports;
    public readonly Container $container;
    public readonly Coupons $coupons;
    public readonly Documents $documents;
    public readonly Events $events;
    public readonly Health $health;
    public readonly Integrations $integrations;
    public readonly Newsletter $newsletter;
    public readonly OpenApi $openApi;
    public readonly Permissions $permissions;
    public readonly Ping $ping;
    public readonly Plus $plus;
    public readonly Preorders $preorders;
    public readonly PublicApi $publicApi;
    public readonly PublicSettings $publicSettings;
    public readonly Storage $storage;
    public readonly Team $team;
    public readonly ThemeAssets $themeAssets;
    public readonly Traffic $traffic;
    public readonly Webhooks $webhooks;

    public function __construct(IgniteClientConfig $config)
    {
        $this->transport = new HttpTransport($config);
        $this->auth = new Auth($this->transport);
        $this->services = new Services($this->transport);
        $this->billing = new Billing($this->transport);
        $this->checkout = new Checkout($this->transport);
        $this->shop = new Shop($this->transport);
        $this->dashboard = new Dashboard($this->transport);
        $this->domains = new Domains($this->transport);
        $this->subdomains = new Subdomains($this->transport);
        $this->ipManager = new IpManager($this->transport);
        $this->sshKeys = new SshKeys($this->transport);
        $this->support = new Support($this->transport);
        $this->user = new User($this->transport);
        $this->wallet = new Wallet($this->transport);
        $this->business = new Business($this->transport);
        $this->affiliates = new Affiliates($this->transport);
        $this->family = new Family($this->transport);
        $this->byoip = new Byoip($this->transport);
        $this->floatingIps = new FloatingIps($this->transport);
        $this->addresses = new Addresses($this->transport);
        $this->blogPosts = new BlogPosts($this->transport);
        $this->byoas = new Byoas($this->transport);
        $this->caseReports = new CaseReports($this->transport);
        $this->container = new Container($this->transport);
        $this->coupons = new Coupons($this->transport);
        $this->documents = new Documents($this->transport);
        $this->events = new Events($this->transport);
        $this->health = new Health($this->transport);
        $this->integrations = new Integrations($this->transport);
        $this->newsletter = new Newsletter($this->transport);
        $this->openApi = new OpenApi($this->transport);
        $this->permissions = new Permissions($this->transport);
        $this->ping = new Ping($this->transport);
        $this->plus = new Plus($this->transport);
        $this->preorders = new Preorders($this->transport);
        $this->publicApi = new PublicApi($this->transport);
        $this->publicSettings = new PublicSettings($this->transport);
        $this->storage = new Storage($this->transport);
        $this->team = new Team($this->transport);
        $this->themeAssets = new ThemeAssets($this->transport);
        $this->traffic = new Traffic($this->transport);
        $this->webhooks = new Webhooks($this->transport);
    }

    public function setToken(?string $token): void
    {
        $this->transport->setToken($token);
    }

    public function getToken(): ?string
    {
        return $this->transport->getToken();
    }
}
