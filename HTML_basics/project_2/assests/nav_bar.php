<?php

echo "<div class='nav'>";
    echo "<table>";  #table used to help with layout of my hyperlinks

        echo "<tr>";  # opens the table row (tr)

            echo "<td class='linkbox'> <a href='learningTools.php'>Characters</a></td>"; #open a cell for a link to be housed
            echo "<td class='linkbox'> <a href='WiderLearning.php'>Plot</a></td>";
            echo "<td class='linkbox'> <a href='SubjectsLearning.php'>Media</a></td>";
            echo "<td class='linkbox'> <a href='ProgressAndRewards.php'>Mail List</a></td>";

        echo "</tr>";  # closes the row of the table.

    echo "</table>";  # closes the table off

echo "</div>";