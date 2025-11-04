<?php
require_once "profile_model_inc.php";

$results = $results ?? [];
$results['cmp_name'] = $results['cmp_name'] ?? 'ExampleCorp';
$results['industry'] = $results['industry'] ?? 'Software';
$results['headquarters'] = $results['headquarters'] ?? 'San Francisco, CA';
$results['overview'] = $results['overview'] ?? 'An example company overview.';
$results['website'] = $results['website'] ?? 'https://example.com';
$results['special'] = $results['special'] ?? 'Web, Cloud, AI';
$results['achieve'] = $results['achieve'] ?? 'Reached 1M users.';
$results['cmp_size'] = $results['cmp_size'] ?? '201-500';

$cover = $cover ?? 'https://placehold.co/1200x300/e2e8f0/64748b?text=Cover+Image';
$logo = $logo ?? 'https://placehold.co/200x200/e2e8f0/64748b?text=Logo';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company Profile</title>
    
    <link href="profile_edit.css" type="text/css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>

    <form action="save_update.php" method="POST" enctype="multipart/form-data">
        <div class="main_div">

            <div class="first_div">
                
                <div class="card">
                    <div class="card-header">Company Media</div>
                    <div class="form-grid">
                        <div class="full-span">

                            <div class="upload-group">
                                <label for="cover_file">Cover Photo</label>
                                <img src="<?php echo htmlspecialchars($cover); ?>" class="image-preview cover-preview">
                                <div class="upload-controls">
                                    <label class="file-btn">
                                        <span>Choose File</span>
                                        <input type="file" id="cover_file" name="cover_file">
                                    </label>
                                    <button type="submit" name="delete_cover" class="btn btn-danger">Delete Cover</button>
                                </div>
                            </div>
                            
                            <div class="upload-group">
                                <label for="logo_file">Company Logo</label>
                                <img src="<?php echo htmlspecialchars($logo); ?>" class="image-preview logo-preview">
                                <div class="upload-controls">
                                     <label class="file-btn">
                                        <span>Choose File</span>
                                        <input type="file" id="logo_file" name="logo_file">
                                    </label>
                                    <button type="submit" name="delete_logo" class="btn btn-danger">Delete Logo</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">General Information</div>
                    <div class="form-grid">
                        
                        <label for="cmp_name">Company Name</label>
                        <input type="text" id="cmp_name" name="cmp_name" value="<?php echo htmlspecialchars($results['cmp_name']); ?>">
                        
                        <label for="industry">Industry</label>
                        <input type="text" id="industry" name="industry" value="<?php echo htmlspecialchars($results['industry']); ?>">
                        
                        <label for="headquarters">Headquarters</label>
                        <input type="text" id="headquarters" name="headquarters" value="<?php echo htmlspecialchars($results['headquarters']); ?>">

                        <label for="website">Website</label>
                        <input type="text" id="website" name="website" value="<?php echo htmlspecialchars($results['website']); ?>">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Overview</div>
                    <div class="form-grid">
                        <div class="full-span">
                            <textarea name="overview" placeholder="An example company overview..."><?php echo htmlspecialchars($results['overview']); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Specialties</div>
                    <div class="form-grid">
                        <div class="full-span">
                            <textarea name="special" placeholder="Web, Cloud, AI..."><?php echo htmlspecialchars($results['special']); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Achievements</div>
                    <div class="form-grid">
                        <div class="full-span">
                            <textarea name="achieve" placeholder="Reached 1M users..."><?php echo htmlspecialchars($results['achieve']); ?></textarea>
                        </div>
                    </div>
                </div>

            </div>

            <div class="second_div">
                <div class="sidebar-widget">
                    <h3>Actions</h3>
                    <button type="submit" name="save_all" class="btn btn-save">Save All Changes</button>
                </div>

                <div class="sidebar-widget">
                    <h3>Company Stats</h3>
                    <div class="form-grid">
                        <label for="industry_stat">Industry</label>
                        <input type="text" id="industry_stat" value="<?php echo htmlspecialchars($results['industry']); ?>" readonly>
                        
                        <label for="headquarters_stat">Headquarters</label>
                        <input type="text" id="headquarters_stat" value="<?php echo htmlspecialchars($results['headquarters']); ?>" readonly>

                        <label for="cmp_size">Company Size</label>
                        <input type="text" id="cmp_size" name="cmp_size" value="<?php echo htmlspecialchars($results['cmp_size']); ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('industry').addEventListener('input', function() {
            document.getElementById('industry_stat').value = this.value;
        });
        document.getElementById('headquarters').addEventListener('input', function() {
            document.getElementById('headquarters_stat').value = this.value;
        });
    </script>

</body>
</html>