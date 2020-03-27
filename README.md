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

## Builder

construct complex objects step by step. The pattern allows you to produce different types and representations of an object using the same construction code.

Intent:
Separate the construction of a complex object from its representation so that the same construction process can create different representations.
Parse a complex representation, create one of several targets
Builder focuses on constructing a complex object step by step. Abstract Factory emphasizes a family of product objects (either simple or complex). Builder returns the product as a final step, but as far as the Abstract Factory is concerned, the product gets returned immediately.
Builder often builds a Composite.
Often, designs start out using Factory Method (less complicated, more customizable, subclasses proliferate) and evolve toward Abstract Factory, Prototype, or Builder (more flexible, more complex) as the designer discovers where more flexibility is needed.

### Problema

Imagine a complex object that requires laborious, step-by-step initialization of many fields and nested objects. Such initialization code is usually buried inside a monstrous constructor with lots of parameters. Or even worse: scattered all over the client code.
https://refactoring.guru/design-patterns/builder
Criação de objetos é complexa
Várias representações possíveis

### Exemplo

https://laravel.com/docs/5.8/queries

## Observer


define a subscription mechanism to notify multiple objects about any events that happen to the object they’re observing.
when to refactor: Subclasses are hard-coded to notify a single instance of another class

Mediator and Observer are competing patterns. The difference between them is that Observer distributes communication by introducing "observer" and "subject" objects, whereas a Mediator object encapsulates the communication between other objects. We've found it easier to make reusable Observers and Subjects than to make reusable Mediators.












