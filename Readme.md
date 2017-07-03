
1. Create an application with following requirements:

- latest PHP or Golang
- takes MSISDN as an input
- returns MNO identifier, country dialling code, subscriber number and country identifier as defined with ISO 3166-1-alpha-2
- do not care about number portability

2. Write all needed tests.

3. Expose the package through an RPC API, select one and explain why have you chosen it.

4. Use git, vagrant and/or docker, and a configuration management tool (puppet, chef, ansible ...).

5. Other:

- a git repository with full commit history is expected to be part of the delivered solution
- if needed, provide additional installation instructions, but there shouldn't be much more than running a simple command to set everything up
- use best practices all around. For PHP, good source of that would be http://www.phptherightway.com


Requirements 

PHP >= 5.4
Appache


Expose the package through an RPC API, select one and explain why have you chosen it.

I choose JSON, because parsers and writers are available for many, many languages. This means that JSON that a PHP script generates can be very easily understood by a JavaScript script. It is the best way to transmit complex structures like arrays and objects, and have it still be compatible with multiple languages.