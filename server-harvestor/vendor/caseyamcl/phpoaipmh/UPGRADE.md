Upgrading from Version 1.x to 2.x
=================================

* Usages of `Phpoaipmh\Http\Guzzle` should now instead use `Phpoaipmh\HttpAdapter\GuzzleAdapter`.
* Usages of `Phpoaipmh\Http\Curl` should now instead use  `Phpoaipmh\HttpAdapter\CurlAdapter`.
* Any class that implemets the `Phpoaipmh\Http\Client` interface should now instead implement `Phpoaipmh\HttpAdapter\HttpAdapterInteraface`.
* Change typhints or references for `Phpoaipmh\ResponseList` to `Phpoaipmh\RecordIterator`.
* If using Guzzle, ensure that you upgrade to Version 5 or later.
* Remove any usage of the `Phpoaipmh\Endpoint::processList()` method.  It is no longer necessary, since
  all methods now return an iterator object by default.  
     * If you absolutely must convert the iterator to an array, use PHP's built-in `iterator_to_array()` function.  However,
      this is not recommended, since it may take a very long time to execute.
* Exception class names have changed:
     * `Phpoaipmh\OaipmhRequestException` is now `Phpoaipmh\Exception\OaipmhException`
     * `Phpoaipmh\Client\RequestException` is now `Phpoaipmh\Exception\HttpException`
     * `Phpoaipmh\Exception\OaipmhException` is now `Phpoaipmh\Exception\BaseOaipmhException`
     * Previously, malformed XML would throw a `Phpoaipmh\OaipmhRequestException`.  It now throws a
       `Phpoaipmh\Exception\MalformedResponseException`.
     * All exceptions extend the `Phpoaipmh\Exception\BaseOaipmhException`, so you can use that as a catch-all.
* Added example