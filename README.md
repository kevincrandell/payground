# Playground Sessions Backend Code Exercise (Lumen)

## Scenario
Take this hypothetical situation.

We are making an iOS and Android app for teachers.
A teacher will select a student to see all lessons, and whether that student completed each lesson.

Each app will get its data from the JSON REST API endpoint:

```
/student-progress/{userId}
```

Where `{userId}` is the user id of the student.

You inherit this WIP codebase.

You remember how the data is structured in the database:
- Lessons are comprised of several segments.
- A user can create practice records for a segment.

You look over the codebase and realize that several problems exist in this endpoint.
1. The front-end data structures are coupled to the database structure.
1. Business rules (eg. whether a user has completed a lesson) would be duplicated by each app.
1. It is too slow, even with a reasonable amount of practice records.

Luckily, both front-end developers agree that the endpoint needs to change before it is used.
You all agree to the following data structure for the response:

```
{
  "lessons": [
    {
      "id": 32,
      "difficulty": "Rookie",
      "isComplete": true
    }
  ]
}
```

## Instructions

Solve all three problems with this codebase.

- Create a separate data structure for the response.
- Codify the business rules.
  - A lesson is considered complete if each segment has at least one practice record with a score of 80% or more.
  - Difficulty categories ("Rookie", "Intermediate", "Advanced") are associated with difficulty numbers
    [1,2,3], [4,5,6], [7,8,9], respectively.
- Ensure the response time is under 500ms for the given dataset.  Right now the response time is about 2 seconds.

Code should be clean.
Code you write should follow the Single Responsibility Principle (SRP).
Code should be written in self-contained parts, each having one responsibility.
For example, application logic (eg. extracting query parameters from a URL)
should be separate from business logic (eg. determining if a required query parameter was supplied).

You have full reign over the codebase. You can add or remove any packages you like. 
For example, you could use a different ORM, or even a different framework, if you think that would be quicker for you.

Everything is fair game.

We are testing your ability to organize code cleanly, with SRP, not your knowledge of the Laravel/Lumen frameworks.

Try to commit often and with small changes, so we can see what you are doing.

If you have a particular strength (say documenting APIs), feel free show it off.

You might benefit from knowing that all 3 problems can be solved without use of a cache.

## Deliverables

Email ben@playgroundsessions.com with a link to your git repository.

## Getting Started

For your convenience,
we provide several approaches to quickly set up a fully operational development environment
with PHP 8.0 and MySQL 8.
- [Docker for Windows](readme/docker-windows.md)
- [Docker for MacOS](readme/docker-macos.md)
- [Ansible for Linux](readme/ansible-linux.md)
- [Do It Yourself](readme/diy.md)

We recommend one of the two Docker approaches.
However, another approach might be easier for you, if you are not familiar with Docker,
or you do not want to risk breaking your VirtualBox VMs.
- *Ansible for Linux* might be easier, if you have a fresh installation of Ubuntu 20.04 on a VM.
- *Do It Yourself* might be easier, if you like sharing your development environment between projects.

Feel free to reach out with questions about setting up your environment.

### Additional Information

Your MySQL credentials have been randomized during the `create-project` process.  Should you want them, 
they are inside the `.env` file in the root folder.

If you used Docker or Ansible, the root mysql password is the same as the playground mysql user. 

## Go!

We look forward to seeing your code! 
# payground
