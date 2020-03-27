# php-design-patterns
Design Pattern examples in the context of an E-commerce / Marketplace integration domain

# Slides

## 2

Analogia (Design Patterns, gof): assim como um escritor utiliza temas já definidos para escrever suas histórias, podemos também basear nossa arquitetura em soluções testadas pelo tempo

Essa ideia nasceu de um livro de arquitetura urbana (Christopher Alexander) as early as 1966 (c.f. "The Pattern of Streets," JOURNAL OF THE AIP, September, 1966, Vol. 32, No. 3, pp. 273-278)

## 3 

Padroes do Go4 são de aplicação genérica
Podem haver até mesmo padrões para lidar com domínios específcos. Eles mesmos dizem que o catálogo deles explorava apenas uma parcela limitada

Criacionais:
Tornam a criação de objetos mais flexível

Estruturais:

These design patterns are all about Class and Object composition. Structural class-creation patterns use inheritance to compose interfaces. Structural object-patterns define ways to compose objects to obtain new functionality.

Comportamentais:
- Permitem alterar o comportamento de classes em runtime, usando composição - o que é muito mais flexível que extensão
- Comunicação entre objetos

## Singleton

- Por que não utilizar uma classe estática?

1 - Classes estáticas nao podem ser passadas como parametro (maioria das linguagens). Logo, não são tão flexíveis e violam o DIP


TL;DR: não abuse ou seu código pode virar procedural

## Decorator

O Decorator surgiu da necessidade de adicionar um comportamento, funcionalidade ou estado extra a um objeto em tempo de execução, por exemplo quando Herança não é concebível por ser um caso que geraria um número muito alto de sub-classes

### Problema

Extending a class is the first thing that comes to mind when you need to alter an object’s behavior. However, inheritance has several serious caveats that you need to be aware of.

Inheritance is static. You can’t alter the behavior of an existing object at runtime. You can only replace the whole object with another one that’s created from a different subclass.
Subclasses can have just one parent class. In most languages, inheritance doesn’t let a class inherit behaviors of multiple classes at the same time.

## Facade

Imagine that you must make your code work with a broad set of objects that belong to a sophisticated library or framework. Ordinarily, you’d need to initialize all of those objects, keep track of dependencies, execute methods in the correct order, and so on.
As a result, the business logic of your classes would become tightly coupled to the implementation details of 3rd-party classes, making it hard to comprehend and maintain.





