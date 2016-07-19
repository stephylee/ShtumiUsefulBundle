ShtumiUsefulBundle - make typical things easier
===============================================

ShtumiUsefulBundle provides some useful things that needed almost in every project. It's:

**Form types**:

* [Ajax Autocomplete form type](https://github.com/shtumi/ShtumiUsefulBundle/blob/master/Resources/doc/ajax_autocomplete.rst) (useful when you operate with thousands and hundred thousands records [for instance: users])

* [Dependent filtered form type](https://github.com/shtumi/ShtumiUsefulBundle/blob/master/Resources/doc/dependent_filtered_entity.rst) (useful when you need operate dependent entities in one form (for instance: countries/regions))

* [Date range form type](https://github.com/shtumi/ShtumiUsefulBundle/blob/master/Resources/doc/daterange.rst) (allows you select date range with JS calendar and take valid DateRange object)

**[DQL extra functions](https://github.com/shtumi/ShtumiUsefulBundle/blob/master/Resources/doc/dql_functions.rst)**:

* IF

* IFNULL

* ROUND

* DATE_DIFF

You can use Ajax autocomplete form type as a filter type with [SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle)



## Installation

### Add the following lines to your  `composer.json` file and then run `php app/console update`:

```
"slad/useful-bundle": "1.0"

```

You also should install [SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle) and all dependencies for it.

### Add ShtumiUsefulBundle to your application kernel
```
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Shtumi\UsefulBundle\SladUsefulBundle(),
            // ...
        );
    }
```

### Import routes

// app/config/routing.yml

```
slad_useful:
    resource: '@SladUsefulBundle/Resources/config/routing.xml'
```

### Update your configuration

#### Add form theming to twig
```
twig:
    ...
    form:
        resources:
            - SladUsefulBundle::fields.html.twig
```

Update your configuration in accordance with [using SladUsefulBundle things](https://github.com/stephylee/SladUsefulBundle/blob/master/Resources/doc/index.rst)

### Load jQuery to your views
```
    <script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
```
