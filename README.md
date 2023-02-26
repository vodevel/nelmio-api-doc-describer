PoC NelmioApiDocBundle Describer via typing
===================================

Replacing
```php
class Controller {
    #[Route('special/point', methods: ['POST'])]
    #[OA\RequestBody(content: new Model(type: SpecialPointRequest::class))]
    #[OA\Response(
        response: 200,
        description: '',
        content: new Model(type: SpecialPointResponse::class),
    )]
    #[OA\Tag(name: 'special')]
    public function specialMethod(SpecialPointRequest $request): SpecialPointResponse {
        return new SpecialPointResponse();
    }
}
```
With
```php
class Controller {
    #[Route('special/point', methods: ['POST'])]
    #[OA\Tag(name: 'special')]
    public function specialMethod(SpecialPointRequest $request): SpecialPointResponse {
        return new SpecialPointResponse();
    }
}

#[OA\RequestBody]
class SpecialPointRequest {}

#[OA\Response]
class SpecialPointResponse {}
```

Register the describer:
```yaml
# services.yaml
App\Service\ApiDoc\Describer\RouteDescriber:
    tags:
    - {name: nelmio_api_doc.route_describer}
```
