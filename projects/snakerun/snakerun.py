import pygame
import random

# Initialize Pygame
pygame.init()

# Set up the game window
window_width = 800
window_height = 600
window = pygame.display.set_mode((window_width, window_height))
pygame.display.set_caption("Snake Chase")

# Define colors
BLACK = (0, 0, 0)
GREEN = (0, 255, 0)
RED = (255, 0, 0)
GRAY = (128, 128, 128)

# Set up the player
player_size = 20
player_x = random.randint(0, window_width - player_size)
player_y = random.randint(0, window_height - player_size)
player_speed = 5

# Set up the snake
snake_size = 20
snake_x = random.randint(0, window_width - snake_size)
snake_y = random.randint(0, window_height - snake_size)
snake_speed = 3

# Set up the gray blocks
block_size = 20
block_speed = 2
blocks = []
for _ in range(10):
    block_x = random.randint(0, window_width - block_size)
    block_y = random.randint(0, window_height - block_size)
    blocks.append([block_x, block_y])

# Set up the clock
clock = pygame.time.Clock()

score = 0
game_over = False
timer = 0

# Load font
font = pygame.font.Font(None, 36)

# Load sound effects
hit_sound = pygame.mixer.Sound("./sound/points.mp3")
game_over_sound = pygame.mixer.Sound("sound/gameover.mp3")

# Load background music
pygame.mixer.music.load("sound/backmusic.mp3")
pygame.mixer.music.set_volume(0.5)
pygame.mixer.music.play(-1)  # Play music on loop

# Game loop
while not game_over:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            game_over = True

    keys = pygame.key.get_pressed()
    if keys[pygame.K_LEFT]:
        player_x -= player_speed
    if keys[pygame.K_RIGHT]:
        player_x += player_speed
    if keys[pygame.K_UP]:
        player_y -= player_speed
    if keys[pygame.K_DOWN]:
        player_y += player_speed

    # Update the player's position
    if player_x < 0 or player_x > window_width - player_size or player_y < 0 or player_y > window_height - player_size:
        game_over = True
        pygame.mixer.music.stop()  # Stop background music
        hit_sound.play()  # Play hit sound effect

    # Update the snake's position
    if snake_x < player_x:
        snake_x += snake_speed
    elif snake_x > player_x:
        snake_x -= snake_speed
    if snake_y < player_y:
        snake_y += snake_speed
    elif snake_y > player_y:
        snake_y -= snake_speed

    # Check collision with the player
    if (player_x < snake_x + snake_size and player_x + player_size > snake_x and
            player_y < snake_y + snake_size and player_y + player_size > snake_y):
        game_over = True
        pygame.mixer.music.stop()  # Stop background music
        hit_sound.play()  # Play hit sound effect

    # Check collision with the gray blocks
    for block in blocks:
        block_x, block_y = block
        if (player_x < block_x + block_size and player_x + player_size > block_x and
                player_y < block_y + block_size and player_y + player_size > block_y):
            game_over = True
            pygame.mixer.music.stop()  # Stop background music
            hit_sound.play()  # Play hit sound effect

    # Clear the screen
    window.fill(BLACK)

    # Draw the player
    pygame.draw.rect(window, GREEN, (player_x, player_y, player_size, player_size))

    # Draw the snake
    pygame.draw.rect(window, RED, (snake_x, snake_y, snake_size, snake_size))

    # Draw the gray blocks
    for block in blocks:
        pygame.draw.rect(window, GRAY, (block[0], block[1], block_size, block_size))

    # Display the timer
    minutes = timer // 60
    seconds = timer % 60
    timer_text = font.render("Time: {:02d}:{:02d}".format(minutes, seconds), True, (255, 255, 255))
    window.blit(timer_text, (10, 10))

    # Update the display
    pygame.display.update()

    # Increment the timer
    timer += 1

    # Move the gray blocks
    for block in blocks:
        block[1] += block_speed

    # Remove the gray blocks that go off the screen
    blocks = [block for block in blocks if block[1] < window_height]

    # Add new gray blocks at the top of the screen
    if timer % 60 == 0:
        block_x = random.randint(0, window_width - block_size)
        blocks.append([block_x, -block_size])

    # Set the frames per second
    clock.tick(60)

# Game over
window.fill(BLACK)
game_over_text = font.render("Game Over", True, (255, 255, 255))
score_text = font.render("Score: " + str(score), True, (255, 255, 255))
timer_text = font.render("Time: {:02d}:{:02d}".format(minutes, seconds), True, (255, 255, 255))
window.blit(game_over_text, (window_width // 2 - game_over_text.get_width() // 2, window_height // 2 - game_over_text.get_height() // 2 - 50))
window.blit(score_text, (window_width // 2 - score_text.get_width() // 2, window_height // 2 - score_text.get_height() // 2 + 20))
window.blit(timer_text, (window_width // 2 - timer_text.get_width() // 2, window_height // 2 - timer_text.get_height() // 2 + 90))
pygame.display.update()

# Play game over sound effect
game_over_sound.play()

# Wait for a few seconds before quitting
pygame.time.wait(2000)

# Quit Pygame
pygame.quit()
