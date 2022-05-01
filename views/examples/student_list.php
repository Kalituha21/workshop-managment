<?php
/**
 * @var array $papers
 */

$papers = [
        ['title' => 'A Collaborative Code Review Platform for GitHub'],
        ['title' => 'A comparative study of hybrid models of selective classification and dynamic selection of analogies for...'],
        ['title' => 'A comparative study of UML Tools'],
        ['title' => 'A Comparison of Metric for UML Class Diagrams'],
        ['title' => 'A comparison of scrum and Kanban for identifying their selection factors'],
        ['title' => 'A comparison of Security Assurance Support of Agile Software Development Methods'],
        ['title' => 'A comparison of the Implementation Means for Development of Modelling Tools'],
        ['title' => 'A Conceptual Data Model and its Automatic Implementation for IoT-Based Business Intelligence'],
        ['title' => 'A framework to apply ISO-IEC2110 on SCRUM'],
        ['title' => 'A Framework to Formally Verify Conformance of a Software Process to a Software Method'],
];
?>


<div class="container mt-3">
    <div class="row bg-secondary text-white">
        <div class="col-1 border border-dark">
            Nr
        </div>
        <div class="col-2 border border-dark">
            Edit
        </div>
        <div class="col border border-dark">
            Title of the papers
        </div>
    </div>

    <?php foreach($papers as $key=>$value) : ?>
        <div class="row bg-light text-dark">
            <div class="col-1 border border-dark">
                <?=++$key; ?>
            </div>
            <div class="col-2 border border-dark">
                <button type="button" class="btn btn-light"><img src="<?= img('hand.png'); ?>" alt="Hand" height="20" width="20"></button>
                <button type="button" class="btn btn-light"><img src="<?= img('refuse.png'); ?>" alt="Refuse" height="20" width="20"></button>
            </div>
            <div class="col border border-dark">
                <?=$value['title']; ?>
            </div>

        </div>
    <?php endforeach; ?>
</div>
