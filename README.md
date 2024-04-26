# Card Maker Bundle

simple bundle for board game card generation

## Instalation:

Update composer.json with:

```
    "require": {
        "mporembski/cardmaker-bundle": "dev-develop"
```

and:

```
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/michalporembski/cardmakerbundle.git"
        }
    ]
```

then run `composer update`

update bundles list by adding in `config/bundles.php`:

```
    MPorembski\SampleModule\SymfonySampleModuleBundle::class => ['all' => true],
```

update routing by adding in `config/routes.yaml`:

```
sample_bundle:
  resource: '@SymfonySampleModuleBundle/Resources/config/routing.yaml'
```

## Development

todo..

## 
