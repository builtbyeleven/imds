## IMDS

A package to read AWS Instance Metadata Service

## Usage

```php
use BuiltByEleven\Imds\Imds;

$imds = new Imds();

// Get AMI ID
echo $imds->amiId();
```
