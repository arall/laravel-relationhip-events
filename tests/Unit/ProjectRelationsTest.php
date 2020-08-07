<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Domain;
use App\Models\Host;
use App\Models\Project;

class ProjectRelationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Attach a Project into a Domain.
     *
     * @return void
     */
    public function testAttachProjectIntoDomain()
    {
        $domain = factory(Domain::class)->create();
        $host = factory(Host::class)->create();
        $project = factory(Project::class)->create();

        $domain->host()->associate($host);
        $domain->save();

        $domain->projects()->attach($project);

        $hostProject = $host->projects()->first();

        $this->assertEquals($project->id, $hostProject->id);
    }

    /**
     * Attach a Domain into a Project.
     *
     * @return void
     */
    public function testAttachDomainIntoProject()
    {
        $domain = factory(Domain::class)->create();
        $host = factory(Host::class)->create();
        $project = factory(Project::class)->create();

        $domain->host()->associate($host);
        $domain->save();

        $project->domains()->attach($domain);

        $hostProject = $host->projects()->first();

        $this->assertEquals($project->id, $hostProject->id);
    }
}
